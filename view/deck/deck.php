<?php 

$sql = "SELECT * FROM decks WHERE isHidden = 0";
$keyword = $base->get_var(1);
$sort = $base->get_var(2);

function getSQL($i) {
	$array = array(
		0 => " ORDER BY meta desc, vote desc, time DESC",
		'vote' => " ORDER BY vote",
		'title' => " ORDER BY deck_title",
		'scrolls' => " ORDER BY scrolls",
		'resources' => " ORDER BY tOrder, decay, growth, energy",
		'meta' => " ORDER BY meta",
		'user' => " ORDER BY deck_author"	
	);
	
	return $array[$i];
}

function setOperator($type) {
	
	if (isset($type) && $type == 1) {
		return " AND ";
	} else {
		return " OR ";
	}
}


if (isset($_POST['search'])) {
	$contains_scrolls = $_POST['contains_scroll'];
	$name = preg_replace("/(.+) \\(id: (.+)\\)/ui", "$1", $_POST['contains_scroll']);
	$id = preg_replace("/(.+) \\(id: (.+)\\)/ui", "$2", $_POST['contains_scroll']);
	
	if (!empty($_POST['contains_scroll'])) {
		$sql .= " AND JSON LIKE :id";
	}
	
	
	$searchstring = $_POST['searchvalue'];
	
	
	if (!empty($searchstring)) {
		$sql .= " AND (deck_title LIKE :value OR deck_author LIKE :value OR tags LIKE :value)";
	}
	
	
	$operator = "";
	$factionSearch = "";
	
	if (isset($_POST['faction_growth']) ||
		isset($_POST['faction_energy']) ||
		isset($_POST['faction_order']) ||
		isset($_POST['faction_decay']) ||
		isset($_POST['faction_wild'])) {
			$factionSearch .= " AND (";
	}

	
	if ($_POST['search_type'] == 1) {
		$type = false;
	} else {
		$type = true;
	}
	
	if (isset($_POST['faction_growth'])) {
		$growth = true;
		$factionSearch .= $operator."growth = 1";
		$operator = setOperator($_POST['search_type']);
	} else {
		$growth = false;
		if ($_POST['search_type'] == 1) {
			if ($factionSearch === " AND (") {
				$factionSearch .= " growth = 0";
			} else {
				$factionSearch .= " AND growth = 0";
			}
			$operator = setOperator($_POST['search_type']);
		}
	}
	if (isset($_POST['faction_energy'])) {
		$energy = true;
		$factionSearch .= $operator."energy = 1";
		$operator = setOperator($_POST['search_type']);
	} else {
		$energy = false;
		if ($_POST['search_type'] == 1) {

			if ($factionSearch === " AND (") {
				$factionSearch .= " energy = 0";
			} else {
				$factionSearch .= " AND energy = 0";
			}
			$operator = setOperator($_POST['search_type']);
		}
	}
	if (isset($_POST['faction_order'])) {
		$order = true;
		$factionSearch .= $operator."tOrder = 1";
		$operator = setOperator($_POST['search_type']);
	} else {
		$order = false;
		if ($_POST['search_type'] == 1) {
			
			if ($factionSearch === " AND (") {
				$factionSearch .= " tOrder = 0";
			} else {
				$factionSearch .= " AND tOrder = 0";
			}
			$operator = setOperator($_POST['search_type']);
		}
	}
	if (isset($_POST['faction_decay'])) {
		$decay = true;
		$factionSearch .= $operator."decay = 1";
		$operator = setOperator($_POST['search_type']);
	} else {
		$decay = false;
		if ($_POST['search_type'] == 1) {
			
			if ($factionSearch === " AND (") {
				$factionSearch .= " decay = 0";
			} else {
				$factionSearch .= " AND decay = 0";
			}
			$operator = setOperator($_POST['search_type']);
		}
	}
	if (isset($_POST['faction_wild'])) {
		$wild = true;
		$factionSearch .= $operator."wild = 1";
		$operator = setOperator($_POST['search_type']);
	} else {
		$wild = false;
		if ($_POST['search_type'] == 1) {
			if ($factionSearch === " AND (") {
				$factionSearch .= " wild = 0";
			} else {
				$factionSearch .= " AND wild = 0";
			}
			$operator = setOperator($_POST['search_type']);
		}
	}
	
	if (isset($_POST['faction_growth']) ||
		isset($_POST['faction_energy']) ||
		isset($_POST['faction_order']) ||
		isset($_POST['faction_decay']) ||
		isset($_POST['faction_wild'])) {
			$factionSearch .= ")";
	}
	$sql .= $factionSearch;
	
} else {
	$searchstring = "";
	$contains_scrolls = "";
	$growth = true;
	$type = true;
	$order = true;
	$decay = true;
	$energy = true;
	$wild = true;
}


$sort_opt = "";
$sort_res = "";
$sql .= getSQL($keyword);

if (!empty($keyword)) {
	if ($sort == "desc" ) {
		 $sql .= " DESC LIMIT 30";
	} else {
		$sql .= " LIMIT 30";
	}
	
	$sort_opt = "/desc";
	
	if ($sort == "desc") $sort_opt = "";
}

$query = $deck->_db->prepare($sql);

if (!empty($searchstring)) {
	$arr = array(
			'value' => "%".$searchstring."%"
		);
	
	$deck->arrayBinder($query, $arr);
	
}
if (!empty($_POST['contains_scroll'])) {
	$arr = array(
			'id' => "%\"id\":".$id.",%"
		);
	
	$deck->arrayBinder($query, $arr);
}

//echo($sql);

 ?>
 <div class="container">
	<div class="row">
		<div class="col-12">
			<form method="post" action="">
				<div class="row">
					<div class="col-5 col-tab-8">
						<div class="form-element">
							<label for="deck_name"><i class="fa fa-search"></i> Search <small>tags, deck name, author</small></label>
							<input id="deck_name" type="text" class="" name="searchvalue" value="<?= $searchstring ?>" placeholder="Search..."/>
						</div>
					</div>
					
					<div class="col-3 col-tab-4">
						<div class="form-element">
							<label>Resources <small>1+</small></label>
							<div class="row align-center">
								<label class="icon">
									<input type="checkbox" name="faction_growth" value="growth" <?php if ($growth) echo("checked") ?> /> <span><i class="icon-growth"></i></span>
								</label>
								<label class="icon">
									<input type="checkbox" name="faction_order" value="order" <?php if ($order) echo("checked") ?> /> <span><i class="icon-order"></i></span>
								</label>
								<label class="icon">
									<input type="checkbox" name="faction_energy" value="energy" <?php if ($energy) echo("checked") ?> /> <span><i class="icon-energy"></i></span>
								</label>
								<label class="icon">
									<input type="checkbox" name="faction_decay" value="decay" <?php if ($decay) echo("checked") ?> /> <span><i class="icon-decay"></i></span>
								</label>
								<label class="icon">
									<input type="checkbox" name="faction_wild" value="wild" <?php if ($wild) echo("checked") ?> /> <span><i class="icon-wild"></i></span>
								</label>
							</div>
						</div>
					</div>

					<div class="col-4 col-tab-6">
						<div class="form-element">
							<label for="contains_scroll">Contains Scroll <small>3+ chars for suggestion</small></label>
							<input id="contains_scroll" class="typeahead" type="text" name="contains_scroll" value="<?= $contains_scrolls ?>" placeholder="Scroll Name" />
						</div>
					</div>
					<div class="col-6 col-tab-6">
						<div class="form-element">
							<label>Resource Search Type</label>
							<div class="row">
								<label>
									<input type="radio" name="search_type" <?php if ($type) echo("checked") ?> value="0" /> <span>Contains Resource</span>
								</label>
								<label>
									<input type="radio" name="search_type" <?php if (!$type) echo("checked") ?> value="1" /> <span>Exact Resource</span>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-tab-12">
						<div class="form-element">
							<button type="submit" name="search" class="btn"><i class="fa fa-search"></i> Search</button>
							<a href="/new">New Deck</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<div class="row">
	<table class="even divider hover border">
		<thead class="">
			<tr class="">
				<td class="align-center" width="20px"><a href="/decks/vote<?=$sort_opt?>"><i class="fa fa-star"></i></a></td>
				<td class=""><a href="/decks/title<?=$sort_opt?>">Title</a></td>
				<td class="align-center" width="50px"><a href="/decks/scrolls<?=$sort_opt?>">Scrolls</a></td>
				<td class="align-center"><a href="/decks/resources<?=$sort_res?>">Resources</a></td>
				<td class="align-center"><a href="/decks/meta<?=$sort_opt?>">Meta</a></td>
				<td class="align-center"><a href="/decks/user<?=$sort_opt?>">Player</a></td>
			</tr>
		</thead>
		
		
		
		<tbody id="table_content">
		<?php 	
			
			$query->execute();
			if ($query->rowCount() == 0) { ?>
				<tr class="">
					<td class="align-center" colspan="6">No Decks</td>
				</tr>
			<?php }
			
			while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			
		?>
	
		
			<tr class="">
				<td class="align-center"><?= $row['vote'] ?></td>
				<td class=""><a href="/deck/<?= $row['id'] ?>" class=""><?= $row['deck_title'] ?></a></td>
				<td class="align-center"><?= $row['scrolls'] ?></td>
				<td class="align-center">
					<?php 
						if (!empty($row['tOrder'])) {
							echo("<i class='icon-order'></i> ");
						}
						if (!empty($row['growth'])) {
							echo("<i class='icon-growth'></i> ");
						}
						if (!empty($row['energy'])) {
							echo("<i class='icon-energy'></i> ");
						}
						if (!empty($row['decay'])) {
							echo("<i class='icon-decay'></i> ");
						}
						if (!empty($row['wild'])) {
							echo("<i class='icon-wild'></i>");
						}
					 ?>
				</td>
				<td class=""><?= $row['meta'] ?></td>
				<td class=""><?= $row['deck_author'] ?></td>
			</tr>
				
		<?php } ?>
		
		</tbody>
	</table>
	</div>
</div>

<?php 

$arrayString = array();

$query = $deck->_db->prepare("SELECT name, id FROM scrollsCard");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	array_push($arrayString, $row['name']." (id: ".$row['id'].")");
}


 ?>

<script>
	$(function() {
		var substringMatcher = function(strs) {
		  return function findMatches(q, cb) {
		    var matches, substrRegex;
		 
		    // an array that will be populated with substring matches
		    matches = [];
		 
		    // regex used to determine if a string contains the substring `q`
		    substrRegex = new RegExp(q, 'i');
		 
		    // iterate through the pool of strings and for any string that
		    // contains the substring `q`, add it to the `matches` array
		    $.each(strs, function(i, str) {
		      if (substrRegex.test(str)) {
		        // the typeahead jQuery plugin expects suggestions to a
		        // JavaScript object, refer to typeahead docs for more info
		        matches.push({ value: str });
		      }
		    });
		 
		    cb(matches);
		  };
		};
		 
		var scrolls = <?php echo json_encode($arrayString) ?>;
		 
		$('#contains_scroll').typeahead({
		  hint: false,
		  highlight: true,
		  minLength: 3
		},
		{
		  name: 'scrolls',
		  displayKey: 'value',
		  source: substringMatcher(scrolls)
		});
	});
</script>
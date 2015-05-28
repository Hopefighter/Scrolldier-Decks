<div class="container">
	<div class="row">
		<div class="col-12">
		<?php 
		//SELECT * FROM decks WHERE JSON LIKE '%\"id\":scrollsCard.id%' AND isHidden = 0 ORDER BY vote DESC LIMIT 5
	
		
			$query = $deck->_db->prepare("SELECT * FROM scrollsCard ORDER BY costdecay,costgrowth, costenergy, costorder, name");
			if ($query->execute()) {
				$row = 0;
				$max_row = 3;
				$faction = [
					"growth" => 0,
					"order" => 0,
					"energy" => 0,
					"decay" => 0
				];
				$delay = [];
				while ($scroll = $query->fetch(PDO::FETCH_ASSOC)) { 
				array_push($delay, $scroll);
				$row++;
				if ($faction[$deck->getFaction($scroll)] == 0) {
					?>
					<div class="row">
					<div class="page-header">
						<h2><i class="icon-<?= $deck->getFaction($scroll) ?> text"></i>  <?= ucfirst($deck->getFaction($scroll)) ?></h2>
					</div>
					</div>
					<?php
					$faction[$deck->getFaction($scroll)] = 1;
				}
				
				if ($row == 1) { echo("<div class='row'>"); }
				?>
				<div class="col-3 col-tab-6 col-phone-6 scroll-container hand" data-name="<?= $scroll['name'] ?>" data-id="<?= $scroll['id'] ?>">
					<div class="col-12 scroll-header" style="background-image: url('img/scrolls/<?= $scroll['image'] ?>.png');">
						<i class="number-<?= $deck->getFactionCost($scroll) ?>"></i><i class="icon-<?= $deck->getFaction($scroll) ?>"></i> 
					</div>
					<div class="col-12">
						<h4><?= $scroll['name'] ?> <br /><small><?= $scroll['kind'] ?>: <?= $scroll['types'] ?></small></h4>
					</div>
				</div>
			<?php
				if ($row > $max_row) {
					echo("</div>");
					$row = 0;
					
					for ($i = 0; $i < count($delay); $i++) {
						echo("<div id='scroll-".$delay[$i]['id']."'></div>");
					}
					$delay = [];
				}
			
			   }
			}
			 ?>
		</div>
	</div>
</div>
<script>
$(function() {
	$(".scroll-container").click(function() {
		var id = $(this).attr("data-id");
		$("[id*=scroll-]").slideUp();
		
		if ($("#scroll-"+id).html() == "") {
			$.ajax({
			  method: "POST",
			  url: "view/admin/ajax/scroll.php",
			  data: { id: $(this).attr("data-id") }
			})
			  .done(function( data ) {
			  	
			    $("#scroll-"+id).html(data);
			    $("#scroll-"+id).slideDown();
			    console.log("done fetching data for scrolls #"+id);
			  });
		}
		
		if ($("#scroll-"+$(this).attr("data-id")).css("display") == "block") {
			$("#scroll-"+$(this).attr("data-id")).slideUp();
		} else {
			$("#scroll-"+$(this).attr("data-id")).slideDown();
		}
	});
});

</script>
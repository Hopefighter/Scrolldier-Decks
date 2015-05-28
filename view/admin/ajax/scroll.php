<?php $id = $_POST['id'];

include("ajax_prepend.php");
$query = $deck->_db->prepare("SELECT * FROM scrollsCard WHERE id = $id");

$query->execute();

$scroll = $query->fetch(PDO::FETCH_ASSOC);

function flavorReplace($searchText) {
	return preg_replace("/\\\\n/u", "<br />", $searchText);
}

if ($scroll['kind'] == "CREATURE" || $scroll['kind'] == "STRUCTURE") {
	$stats = $scroll['ap']."/".$scroll['ac']."/".$scroll['hp'];
} else {
	$stats = "";
}

 ?>
<div class="col-12">
	<div class="col-5 align-center">
		<img src="http://api.scrolldier.com/view/php/api/scrollimage.php?id=<?= $scroll['id'] ?>"  alt="" />
	</div>
	<?php if ($scroll['kind'] == "CREATURE" || $scroll['kind'] == "STRUCTURE") { ?>
	<div class="col-7" id="unit-<?= $scroll['id'] ?>">
	
	</div>
	<div class="col-12">
	<?php }  else { ?>
	<div class="col-7">	
	<?php }?>
	
		<div class="col-12">
			<h4>Decks</h4>
			<?php 
			$decks = $deck->_db->prepare("SELECT id, deck_title, JSON, vote FROM decks WHERE JSON LIKE '%\"id\":".$scroll['id']."%' AND isHidden = 0 ORDER BY vote DESC LIMIT 6");
				if ($decks->execute()) {
					while ($deckRow = $decks->fetch(PDO::FETCH_ASSOC)) {  ?>
						<?php if ($scroll['kind'] == "CREATURE" || $scroll['kind'] == "STRUCTURE") { ?>
							<div class="col-4">
						<?php } else { ?>
							<div class="col-12">
						<?php } ?>
								<p><?= $deckRow['vote'] ?> <i class="fa fa-star"></i> <a href="/deck/<?= $deckRow['id'] ?>" target="_blank"><?= $deckRow['deck_title'] ?></a></p>
							</div>
					<?php }
				}
			
			?>
		</div>
	</div>
</div>
<?php if ($scroll['kind'] == "CREATURE" || $scroll['kind'] == "STRUCTURE") { ?>

<script>
	console.log('begin');
	
	var url = 'data/';
	var id = <?= $scroll['bundle'] ?>;
	var element = document.getElementById("unit-<?= $scroll['id'] ?>");
	var attrs = {};
	
	var canvas = document.createElement('canvas');
	
	var zoom = 1;
	var shift = 0;
	
	canvas.width = 530 * zoom;
	canvas.height = 490 * zoom;
	element.appendChild(canvas);
	var ctx = canvas.getContext('2d');
	ctx.setTransform(1, 0, 0, 1, 0, 0);
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	
	var standDeferred = $.Deferred();
	var standImg = new Image();
	standImg.src = url + 'images/unitstand.png';
	standDeferred.img = standImg;
	standImg.onload = function() {
	  standDeferred.resolve(standDeferred);
	};
	
	var spritesImg = new Image();
	var data;
	
	data = $.ajax({
	  url: url + 'bundles/' + id + '/data.json',
	});
	
	var deferred = $.Deferred();
	
	spritesImg.src = url + 'bundles/' + id + '/sprites.png';
	spritesImg.onload = function() {
	  deferred.img = spritesImg;
	  deferred.resolve(deferred);
	};
	
	$.when(data, standDeferred, deferred).then(ready);
	
	function ready(d) {
	  data = d[0];
	  console.log('ready');  
	  
	  var fps = 24;
	  var firstFrameTime = null;
	
	  function animate() {
	    window.requestAnimationFrame(function() {
	
	      var time = (new Date()).getTime();
	
	      var animation = data.animations.idle;
	
	      if (!firstFrameTime) {
	        firstFrameTime = time;
	      }
	
	      var elapsed = Math.round((time - firstFrameTime) / (1000 / fps));
	
	      var animated = true;
	      var inView = true;
	      var delay = (animated && inView) ? (1000 / 30) : (1000 / 3);
	      var frame = elapsed % animation.length;
	
	      if (inView || (elapsed === 0)) {
	        if ((frame !== previousFrame) && (animated || previousFrame === null)) {
	          previousFrame = frame;
	          renderFrame(animation[frame]);
	        }
	      }
	
	      setTimeout(function() {
	        animate();
	      }, delay);
	    });
	  }
	
	  var previousFrame = null;
	
	  animate(id);
	}
	
	function renderPart(part) {
	  if (part.length === 3) {
	    part.splice(1, 0, 1, 0, 0, 1);
	  }
	
	  var s = data.sprites[part[0]];
	  var e = 264 * zoom + part[5] / (s[4] / s[2]);
	  var f = 270 * zoom + shift + part[6] / (s[5] / s[3]);
	  ctx.setTransform(part[1], part[2], part[3], part[4], e, f);
	  ctx.drawImage(spritesImg, s[0], s[1], s[2], s[3], 0, 0, s[2], s[3]);
	}
	
	function clearFrame() {
	  ctx.setTransform(1, 0, 0, 1, 0, 0);
	  ctx.clearRect(0, 0, canvas.width, canvas.height);
	  var w = standImg.width * 0.58;
	  var h = standImg.height * 0.58;
	  ctx.globalAlpha = 0.8;
	  ctx.drawImage(standImg, 0, 0, standImg.width, standImg.height, (canvas.width - w) / 2, 328 * zoom + shift, w, h);
	  
	  ctx.globalAlpha = 1;
	}
	
	function renderFrame(frame) {
	  clearFrame();
	  frame.forEach(renderPart);
	}
</script>	
<?php } ?>
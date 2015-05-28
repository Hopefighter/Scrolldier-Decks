<style>
button{
	background-color: transparent;
}

#scroll{
	cursor: move;
}


#dragg, #rotate{
	width: 15px;
	height: 15px;
	border-radius: 10px;
	background: -webkit-radial-gradient(ellipse farthest-corner, #d7d7d7 0%, #999999 100%) #111111;
	background: -moz-radial-gradient(ellipse farthest-corner, #d7d7d7 0%, #999999 100%) #111111;
	background: -ms-radial-gradient(ellipse farthest-corner, #d7d7d7 0%, #999999 100%) #111111;
	background: radial-gradient(ellipse farthest-corner, #d7d7d7 0%, #999999 100%) #111111;
	border: 1px solid #8b8b8b;
	position: absolute;
	top: 350px;
	left: 970px;
}
#dragg{
	cursor: nwse-resize;
}
#rotate{
	cursor: pointer;
}

canvas{
	font-family: "honey";
}
@font-face {
	font-family: "honey";
	src: url("fonts/honeymeadbold.woff");
}
@font-face {
	font-family: "honeyitalic";
	src: url("fonts/italicHoney.woff");
}

@font-face {
	font-family: "axe";
	src: url("fonts/axe.woff");
}
</style>
<div class="container">
			<div class="col-6" id="workspace">
				<div class="form-element">
					<div class="col-12">
						<div class="form-element">
							
							<div><button class="btn" id="presetBtn">Preset Art</button></div>
							<div style="display: none;" id="presetBox"></div>
							<label>Art
							<div><input type="text" class="col-12" id="artUrl" value="http://scrolldier.com/resources/cardImages/501.png" /></div>
							</label>
						</div>
					</div>
					<div class="col-12">
						<div class="form-element">
							<button class="btn success" id="updateArt">Update Image</button>
							<button class="btn" id="artPlus">+20px</button>
							<button class="btn" id="artMinus">-20px</button>
						</div>
					</div>
					<div class="col-12">
						<div class="form-element">
							<label>Options</label>
							<div>
								<select id="faction" style="width: 23%;">
									<option value="growth">Growth</option>
									<option value="order">Order</option>
									<option value="energy">Energy</option>
									<option value="decay">Decay</option>
								</select>
								<select id="rarity" style="width: 23%;">
									<option value="0">Common</option>
									<option value="1">Uncommon</option>
									<option value="2">Rare</option>
								</select>
								<select id="cost" style="width: 23%;">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
								</select>
								<select id="foil" style="width: 23%;">
									<option value="1">Tier 1</option>
									<option value="2">Tier 2</option>
									<option value="3">Tier 3</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-element">
							<label>Name
								<input type="text" class="col-12" id="name" name="" value="Rot Eater" placeholder="name" />
							</label>
						</div>
					</div>
					<div class="col-12">
						<div class="form-element">
							<label>Sub Type</label>
							<div>
								<button id="token" class="btn" name="" value="" style="width: 30%;">Token</button>
								
								<select id="subtype" class="textbox" style="width: 30%;">
									<option value="SPELL">Spell</option>
									<option value="ENCHANTMENT">Enchantment</option>
									<option value="CREATURE" selected>Creature</option>
									<option value="STRUCTURE">Structure</option>
								</select>
								<input type="text" class=""  style="width: 30%;" id="subsubtype" name="" value="Linger" placeholder="Subtype" />
							</div>
						</div>
					</div>
					<div class="col-12" id="stats">
						<label>Stats</label>
						<div class="form-element">
							Attack:
							<select id="attack" style="width: 50px;">
								<option value="-">-</option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
							</select>
							Countdown:
							<select id="countdown" style="width: 50px;">
								<option value="-">-</option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
							</select>
							Health:
							<select id="health" style="width: 50px;">
								<option value="-">-</option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
							</select>
						</div>
					</div>
					<div class="col-12">
						<div class="form-element">
							<label>Description & Traits
								<textarea class="textarea" id="description" rows="10" placeholder="Description">[t]* Linger: 4 long trait that goes over
[t] two lines
This is normal text and
a <keyword>
</textarea></label>
						</div>
					</div>
					<div class="col-12 align-center" id="">
						<div class="form-element">
							<label>Flavor Text or Button</label>
							<div>
								<button id="flavorBtn" class="btn success">Flavor</button>
								<button id="buttonBtn" class="btn">Button</button>
							</div>
						</div>
					</div>
					<div class="col-12" id="flavorTextBox">
						<div class="form-element">
							<label>Flavor Text
								<textarea class="textarea" id="flavor" rows="2" placeholder="Flavor text"></textarea>
							</label>
						</div>
					</div>
					<div class="col-12" id="buttonTextBox" style="display: none;">
						<div class="form-element">
							<label>Button
								<div><textarea class="textarea" id="button" rows="1" placeholder="Button Text">Curse Unit</textarea></div>
							</label>
						</div>
					</div>
					
				</div>
			<p>To save the image right click the scroll on the right and click "save image as"</p>
			</div>
			<!---<div class="col-6" id="saved" class="hidden"></div>--->
			<div class="col-6">
				<canvas id="scroll">Your browser does not support Canvas</canvas>
				<div id="dragg"></div>

				<p>Tip: use the gray circle to resize the image, hold shift to maintain/reset the aspect ratio</p>
			</div>
		</div>


	<script src="js/min/scrollEditor-min.js"></script>
</body>
</html>
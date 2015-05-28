<div class="container">
	<div class="col-12">
		<div class="page-header">
			<h2>Custom Match Maker
			</h2>
		</div>
		<div class="col-12">
			<div class="col-6">
				<div class="form-element">
                    <label>Timer: <small>Amount of Seconds a turn lasts</small>
                           <input type="number" id="time" value="90">
                    </label>
				</div>
			</div>
			<div class="col-6" hidden>
				<div class="form-element">
			        <label>Timer Type: <small class="color-danger">Change the timer type (wip)</small>
			               <select>
			               		<option value="totalSeconds">Normal</option>
			               		<option value="infinite">Infinite</option>
			               </select>
			        </label>
				</div>
			</div>
		</div>
        <div class="col-12">
        	<div class="col-6">
				<div class="form-element">
					<div><label for="boss">Unlimited Wild <small>No limit for Wild sacrificing</small></label></div>
					<button id="nowildlmt" class="btn btn-checkbox"></button>
				</div>
			</div>
			<div class="col-6" hidden>
				<div class="form-element">
					<label>Ai Options (wip)</label>
					<div>
					<button id="more-resources-player-one" data-toggle-target="ai-options" class="btn toggle" name="more-resources">More</button></div>
				</div>
			</div>
        </div>
        <div class="col-12" data-toggle-name="ai-options" hidden>
	        <div class="row">
	        		<div class="col-8 align-center col-offset-2">
	        
	        		<label>Ai Difficolity</label>
	        		<div class="form-element radio-col">
	        			<div class="col-4 align-left">
	        				<div class="col-12"><h3><label for="ai-easy">Easy</label></h3></div>
	        				<button id="ai-easy" class="btn btn-radio"></button>
	        			</div>
	        			<div class="col-4 algin-center">
	        				<div class="col-12"><h3><label for="ai-medium">Medium</label></h3></div>
	        				<button id="ai-medium" class="btn btn-radio success"></button>
	        			</div>
	        			<div class="col-4 align-right">
	        				<div class="col-12"><h3><label for="ai-hard">Hard</label></h3></div>
	        				<button id="ai-hard" class="btn btn-radio"></button>
	        			</div>
	        		</div>
	        
	        	</div>
        	</div>
        </div>
		<div class="col-12">
			<div class="col-6">
				<div class="form-element">
                     <label>Resources Player 1<small> </small>
						<input id="resources-player-one" type="number" name="" value="" placeholder="Player 1"/>
					</label>
				</div>
                                <div data-toggle-name="more-resources-player-one" hidden>
                                        <div class="col-2 form-element">
                                            <label>Decay
                                                <input id="decay-player-one" type="number"/>
                                            </label>
                                        </div>
                                        <div class="col-2 form-element">
                                            <label>Energy
                                                <input id="energy-player-one" type="number"/>
                                            </label>
                                        </div>
                                        <div class="col-2 form-element">
                                            <label>Growth
                                                <input id="growth-player-one" type="number"/>
                                            </label>
                                        </div>
                                        <div class="col-2 form-element">
                                            <label>Order
                                                <input id="order-player-one" type="number"/>
                                            </label>
                                        </div>
                                        <div class="col-2 form-element">
                                            <label>Wild
                                                <input id="special-player-one" type="number"/>
                                            </label>
                                        </div>
                                </div>
                                <div class="col-12">
                                    <button id="more-resources-player-one" data-toggle-target="more-resources-player-one" class="btn toggle" name="more-resources">More</button>
                                </div>
			</div>
			<div class="col-6">
				<div class="form-element">
					<label>Resources Player 2<small> </small>
						<input id="resources-player-two" type="number" name="" value="" placeholder="Player 2" />
					</label>
				</div>
                                <div data-toggle-name="more-resources-player-two" hidden>
                                        <div class="col-2 form-element">
                                            <label>Decay
                                                <input id="decay-player-two" type="number"/>
                                            </label>
                                        </div>
                                        <div class="col-2 form-element">
                                            <label>Energy
                                                <input id="energy-player-two" type="number"/>
                                            </label>
                                        </div>
                                        <div class="col-2 form-element">
                                            <label>Growth
                                                <input id="growth-player-two" type="number"/>
                                            </label>
                                        </div>
                                        <div class="col-2 form-element">
                                            <label>Order
                                                <input id="order-player-two" type="number"/>
                                            </label>
                                        </div>
                                        <div class="col-2 form-element">
                                            <label>Wild
                                                <input id="special-player-two" type="number"/>
                                            </label>
                                        </div>
                                </div>
                                <div class="col-12">
                                    <button id="more-resources-player-two" data-toggle-target="more-resources-player-two" class="btn toggle" name="more-resources">More</button>
                                </div>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-8 align-center col-offset-2">

		<label>Starting Player</label>
		<div class="form-element radio-col">
			<div class="col-4 align-left">
				<div class="col-12"><h3><label for="start-p1">Player One</label></h3></div>
				<button id="start-p1" class="btn btn-radio"></button>
			</div>
			<div class="col-4 algin-center">
				<div class="col-12"><h3><label for="start-rnd">Random</label></h3></div>
				<button id="start-rnd" class="btn btn-radio success"></button>
			</div>
			<div class="col-4 align-right">
				<div class="col-12"><h3><label for="start-p2">Player Two</label></h3></div>
				<button id="start-p2" class="btn btn-radio"></button>
			</div>
		</div>

	</div>
	</div>
	<div class="col-12">
		<div class="col-12 well board" style="background-image: url(/img/customeMatch/bg.png);">
			<div class="player-one">
			<div class="page-header" style="background: #121314; opacity: .8;">
				<h3>Player One <small>Challenger</small></h3>
			</div>
			<div class="col-12 align-center">
				<div class="tile-row">
					<div class="idol" data-row='0' data-player="P1">
						<input id="p1-idol-0" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
					<div class="idol" data-row='1' data-player="P1">
						<input id="p1-idol-1" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
					<div class="idol" data-row='2' data-player="P1">
						<input id="p1-idol-2" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
					<div class="idol" data-row='3' data-player="P1">
						<input id="p1-idol-3" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
					<div class="idol" data-row='4' data-player="P1">
						<input id="p1-idol-4" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
				</div>
				<div class="all-tiles">
				<div class="tile-row">
					<div class="tile" data-row='0' data-col='2' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='1' data-col='2' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='2' data-col='2' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='3' data-col='2' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='4' data-col='2' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
				</div>
				<div class="tile-row">
					<div class="tile" data-row='0' data-col='1' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='1' data-col='1' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='2' data-col='1' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='3' data-col='1' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='4' data-col='1' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
				</div>
				<div class="tile-row">
					<div class="tile" data-row='0' data-col='0' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='1' data-col='0' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='2' data-col='0' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='3' data-col='0' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='4' data-col='0' data-player="P1" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					</div>
				</div>
			</div>
<!--
|0,2|0,1|0,0|
|1,2|1,1|1,0|
|2,2|2,1|2,0|
|3,2|3,1|3,0|
|4,2|4,1|4,0|
-->
		</div>
			<div class="player-two">
			<div class="page-header align-right" style="background: #121314; opacity: .8;">
				<h3><small>Challenged</small> Player Two</h3>
			</div>
			<div class="col-12 align-center">
				<div class="tile-row">
					<div class="tile" data-row='0' data-col='0' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='1' data-col='0' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='2' data-col='0' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='3' data-col='0' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='4' data-col='0' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
				</div>
				<div class="tile-row">
					<div class="tile" data-row='0' data-col='1' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='1' data-col='1' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='2' data-col='1' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='3' data-col='1' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='4' data-col='1' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
				</div>
				<div class="tile-row">
					<div class="tile" data-row='0' data-col='2' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='1' data-col='2' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='2' data-col='2' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='3' data-col='2' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
					<div class="tile" data-row='4' data-col='2' data-player="P2" data-boss="0" data-ap="" data-cd="" data-hp="" data-select="false" data-unit=""></div>
				</div>
				<div class="tile-row">
					<div class="idol" data-row='0' data-player="P2">
						<input id="p2-idol-0" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
					<div  class="idol" data-row='1' data-player="P2">
						<input id="p2-idol-1" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
					<div class="idol" data-row='2' data-player="P2">
						<input id="p2-idol-2" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
					<div class="idol" data-row='3' data-player="P2">
						<input id="p2-idol-3" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
					<div class="idol" data-row='4' data-player="P2">
						<input id="p2-idol-4" type="text" class="col-12 idol-box" name="" value="10" />
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="col-12">
		<div class="col-12" id="board-setup">
			<h3>Board Setup <small><span id="text-player"></span>, <span id="text-cords"></span></small></h3>
                        <div class="col-12"><h4>Unit</h4></div>
                        <div class="col-12">
                            <div class="form-element">
					<label> Unit Name <small>Type for suggestions</small>
						<input id="unit" type="text" class="typeahead" name="" value="" placeholder="Unit" />
					</label>
				</div>
			</div>
			<div class="col-6">
				<div class="form-element">
					<label> Attack <small>Will get added to base stats</small>
						<input id="ap" type="number" class="" name="" value="" placeholder="Attack" />
					</label>
				</div>
			</div>
			<div class="col-6">
				<div class="form-element">
					<label> Health <small>Will get added to base stats</small>
						<input id="hp" type="number" class="" name="" value="" placeholder="Health" />
					</label>
				</div>
			</div>
                        <div class="col-6">
				<div class="form-element">
                                        <div><label for="boss">Boss <small>Is this unit a boss unit</small></label></div>
                                        <button id="boss" class="btn btn-checkbox toggle" data-toggle-target="isboss"></button>
				</div>
			</div>
			<div class="col-6" id="cdin" data-toggle-name="isboss">
				<div class="form-element">
					<label> Countdown <small>Will change the starting Countdown</small>
						<input id="cd" type="number" class="" name="" value="" placeholder="Countdown" />
					</label>
				</div>
			</div>
			<div class="col-6" id="selectin" data-toggle-name="isboss" hidden>
				<div class="form-element">
                                        <div><label for="select">Selectable <small>Unslayable and Ward</small></label></div>
					<button id="select" class="btn btn-checkbox"></button>
				</div>
			</div>
                        <div class="col-12"><h4>Spells</h4></div>
                        <div class="col-6">
                        <div class="col-12">
                                <div class="form-element" name="scrolls-text-unocc">
                                        <label> Scroll Name <small>Type for suggestions</small>
                                                <input id="scrolls-text-unocc" type="text" class="typeahead" name="" value="" placeholder="Scrolls" />
                                        </label>
                                </div>
                                <div class="form-element" name="scrolls-text-occ" style="display: none;">
                                        <label> Scroll Name <small>Type for suggestions</small>
                                                <input id="scrolls-text-occ" type="text" class="typeahead" name="" value="" placeholder="Scrolls" />
                                        </label>
                                </div>
                        </div>
                        <div class="col-12">
                                <div class="form-element">
                                        <label> Cast by Player <small></small>
                                            <select id="playcardby">
                                                <option value="" selected="">Default</option>
                                                <option value="P1">Player 1</option>
                                                <option value="P2">Player 2</option>
                                            </select>
                                        </label>
                                </div>
                        </div>
                        <div class="col-12">
                                <div class="form-element">
                                        <button id="addCard" class="btn">Add</button>
                                </div>
                        </div>
                        </div>
                        <div class="col-6">
				<ul class="list-well" id="start-spell-list"></ul>
			</div>
                            
		</div>
		</div>
	<div class="col-12">
		<div class="page-header">
			<h2>Spells & Enchantments</h2>
		</div>
		<div class="col-6">
			<div class="form-element">
				<div class="col-4 align-right col-offset-2">
					<div class="right"><h3><label for="enchant-p1">Player 1</label></h3></div>
					<button id="enchant-p1" class="btn btn-radio success"></button>
				</div>
				<div class="col-4 align-right">
					<div class="right"><h3><label for="enchant-p2">Player 2</label></h3></div>
					<button id="enchant-p2" class="btn btn-radio"></button>
				</div>
			</div>
			<div class="col-12">
				<div class="form-element">
					<label>Buff Units <small>Enchant all units that spawn.</small>
						<input id="enchant-text" type="text" class="typeahead" name="" value="" placeholder="Enchantment"/>
					</label>
				</div>
			</div>
			<div class="col-12">
				<div class="form-element">
					<button id="addEnchant" class="btn">Add</button>
				</div>
			</div>
			<div class="col-12">
				<ul class="list-well" id="enchants-list"></ul>
			</div>
		</div>
		<div class="col-6">
			
			<div class="form-element">
				<div class="col-4 align-right col-offset-2">
					<div class="right"><h3><label for="spell-p1">Player 1</label></h3></div>
					<button id="spell-p1" class="btn btn-radio success"></button>
				</div>
				<div class="col-4 align-right">
					<div class="right"><h3><label for="spell-p2">Player 2</label></h3></div>
					<button id="spell-p2" class="btn btn-radio"></button>
				</div>
			</div>
			<div class="col-12">
				<div class="form-element">
					<label>Cast Spells <small>Casts spell every x round.</small>
						<input id="spells-text" type="text" class="typeahead" name="" value="" placeholder="Spells"/>
					</label>
				</div>
			</div>
			<div class="col-12">
				<div class="form-element">
				<label>Every X round:
					<input id="spell-Round" type="number" name="" value="" />
				</label>
				</div>
			</div>
			
			<div class="col-12">
				<div class="form-element">
					<button id="addSpell" class="btn">Add</button>
				</div>
			</div>
			<div class="col-12">
				<ul class="list-well" id="spell-list"></ul>
			</div>
		</div>
	</div>
</div>
	

<div class="container">
	<div class="col-12">
	<div class="form-element">
		<label>Output <small>Readonly</small></label>
		<textarea id="output" rows="10" readonly="readonly"></textarea>
	</div>
	<div class="form-element align-center">
		<button class="btn big success" id="genCode">Generate code</button>
	</div>
	</div>
</div>
<script>
$(function() {
	var selectedTile;
	var tiles = $("[class$=tile]");
        var counter = 0;
	
	
	function removeAllActive() {
		$(tiles).removeClass("active");
	}
	
	function getPlayer(tile) {
		return $(tile).attr("data-player");
	}
	
	function getCol(tile) {
		return $(tile).attr("data-col");
	}
	
	function getRow(tile) {
		return $(tile).attr("data-row");
	}
	
	function getBoss(tile) {
		return $(tile).attr("data-boss");
	}
	
	function getAp(tile) {
		return $(tile).attr("data-ap");
	}
	function getHp(tile) {
		return $(tile).attr("data-hp");
	}
	function getCd(tile) {
		return $(tile).attr("data-cd");
	}
	function getUnit(tile) {
		return $(tile).attr("data-unit").replace(",", "\\,");
	}
	function getSelect(tile) {
		return $(tile).attr("data-select");
	}
        function updateCastInput(tile) {
                if(tile.hasClass("ocupied")) {
                    $("[name='scrolls-text-occ']").show();
                    $("[name='scrolls-text-unocc']").hide();
                } else {
                    $("[name='scrolls-text-occ']").hide();
                    $("[name='scrolls-text-unocc']").show();
                }
        }
	
	
	setActiveTile($(".all-tiles .tile-row:first-of-type .tile:first-of-type"));
	function setActiveTile(tile) {
		removeAllActive();
		$(tile).addClass("active");
		selectedTile = tile;
		updateForm(tile);
		$("#text-player").text(getPlayer(tile));
		$("#text-cords").text(getRow(tile) +", "+ getCol(tile));
	}
	
	$(tiles).click(function() {
		setActiveTile($(this));
		
		//console.log("unit("+getPlayer(this)+", Unit Name, "+ getRow(this) +", "+ getCol(this) +")")
	});

	$("[id*=li-close]").on("click", function() {
		$(this).parent().remove();
		
	});
	
	$("#addEnchant").on("click", function() {
		if ($("#enchant-text").val() != "") {
			if ($("#enchant-p1").hasClass("success")) {
				player = "P1";
			} else {
				player = "P2";
			}
			
			
			var enchantName = $("#enchant-text").val();
			$("#enchants-list").prepend('<li id="idEnchant-1" data-player="'+player+'" data-enchantment="'+enchantName+'">'+player+'\'s units spawn with '+enchantName+' <button id="li-close" class="btn danger small right">&times;</button></li>');
			
			
			$("[id*=li-close]").on("click", function() {
				$(this).parent().remove();
				
			});
		}
	});
	
	$("#addSpell").on("click", function() {
		if ($("#spells-text").val() != "" && parseInt($("#spell-Round").val()) > 0) {
			if ($("#spell-p1").hasClass("success")) {
				player = "P1";
			} else {
				player = "P2";
			}
			var round = $("#spell-Round").val();
			
			var spell = $("#spells-text").val();
			$("#spell-list").prepend('<li id="idEnchant-1" data-player="'+player+'" data-spell="'+spell+'" data-round="'+round+'">'+player+' will cast '+spell+' every '+round+' round(s) <button id="li-close" class="btn danger small right">&times;</button></li>');
			
			$("[id*=li-close]").on("click", function() {
				$(this).parent().remove();
				
			});
		}
	});
        
        $("#addCard").on("click", function() {
            var playedCard;
            if(selectedTile.hasClass("ocupied")) {
                playedCard = $("#scrolls-text-occ").val();
            } else {
                playedCard = $("#scrolls-text-unocc").val();
            }
            var playedBy = $("#playcardby").val();
            
            $("#start-spell-list").append('<li id="idCard-' + counter + '">' + playedCard + (playedBy != "" ? ' by ' + playedBy : "") + '<button id="li-close" class="btn danger small right">&times;</button></li>');
            selectedTile.append('<div hidden class="playcard idCard-' + counter +'" data-card="' + playedCard + '" data-type="' + scrolltypes[playedCard] + '" data-played="' + playedBy + '"></div>');
            
            counter++;
            
            $("[id*=li-close]").on("click", function() {
                $("." + $(this).parent().attr("id")).remove();
		$(this).parent().remove();
            });
        });
        
        $("#board-setup input,button,ul").on({
                click: function(){
                    updateTile(selectedTile);
                },
                input: function(){
                    updateTile(selectedTile);
                },
                blur: function(){
                    updateTile(selectedTile);
                }
        });

	function updateForm(tile) {
		$("#unit").val(getUnit(tile));
		$("#ap").val(getAp(tile));
		$("#cd").val(getCd(tile));
		$("#hp").val(getHp(tile));
                $("#start-spell-list").children().remove();
		
		if (getBoss(tile) == 1) {
			$("#boss").addClass("success");
                        $("#selectin").show();
                        $("#cdin").hide();
		} else {
			$("#boss").removeClass("success");
                        $("#selectin").hide();
                        $("#cdin").show();
		}
		
		if (getSelect(tile) == "true") {
			$("#select").addClass("success");
		} else {
			$("#select").removeClass("success");
		}
                
                updateCastInput(tile);
                
                tile.children().each(function() {
                        $("#start-spell-list").append('<li id="' + this.getAttribute("class") + '">' + this.getAttribute("data-card") + (this.getAttribute("data-played") != "" ? ' by ' + $(this).attr("data-played") : "") + '<button id="li-close" class="btn danger small right">&times;</button></li>');
                });
                
                $("[id*=li-close]").on("click", function() {
                        $(this).parent().remove();
                });
	}
	
	$("#boss").click(function() {
		if ($(this).hasClass("success")) {
			$("#boss").removeClass("success");
			$(selectedTile).attr("data-boss", 0);
		} else {
			$("#boss").addClass("success");
			$(selectedTile).attr("data-boss", 1);
			
		}
	});
	
	$("#select").click(function() {
		if ($(this).hasClass("success")) {
			$("#select").removeClass("success");
			$(selectedTile).attr("data-select", "false");
		} else {
			$("#select").addClass("success");
			$(selectedTile).attr("data-select", "true");
			
		}
	});
        
        $("#nowildlmt").click(function() {
                $(this).toggleClass("success");
        });
        
        $("[name='more-resources']").click(function() {
                if ($(this).hasClass("success")) {
                    $(this).removeClass("success");
                    $(this).html("More");
                } else {
                    $(this).addClass("success");
                    $(this).html("Less");
                }
        });
	
	$("#start-p1").click(function() {
		$("#start-p1").addClass("success");
		$("#start-p2").removeClass("success");
		$("#start-rnd").removeClass("success");
	});
	$("#start-p2").click(function() {
		$("#start-p2").addClass("success");
		$("#start-p1").removeClass("success");
		$("#start-rnd").removeClass("success");
	});
	
	$("#start-rnd").click(function() {
		$("#start-rnd").addClass("success");
		$("#start-p1").removeClass("success");
		$("#start-p2").removeClass("success");
	});
	
	
	$("#ai-easy").click(function() {
		$("#ai-easy").addClass("success");
		$("#ai-medium").removeClass("success");
		$("#ai-hard").removeClass("success");
	});
	
	$("#ai-medium").click(function() {
		$("#ai-medium").addClass("success");
		$("#ai-easy").removeClass("success");
		$("#ai-hard").removeClass("success");
	});
	
	$("#ai-hard").click(function() {
		$("#ai-hard").addClass("success");
		$("#ai-medium").removeClass("success");
		$("#ai-easy").removeClass("success");
	});
	
	$("#enchant-p2").click(function() {
		$("#enchant-p2").addClass("success");
		$("#enchant-p1").removeClass("success");
	});
	$("#enchant-p1").click(function() {
		$("#enchant-p1").addClass("success");
		$("#enchant-p2").removeClass("success");
	});
	
	
	$("#spell-p2").click(function() {
		$("#spell-p2").addClass("success");
		$("#spell-p1").removeClass("success");
	});
	$("#spell-p1").click(function() {
		$("#spell-p1").addClass("success");
		$("#spell-p2").removeClass("success");
	});
	
	
	
	
	function updateTile(tile) {
		if ($("#unit").val() != "" || $(tile).has("[data-type='CREATURE']").length != 0 ) {
			$(tile).addClass("ocupied");
		} else {
			$(tile).removeClass("ocupied");
		} 
	
		$(tile).attr("data-unit", $("#unit").val());
		$(tile).attr("data-ap", $("#ap").val());
		$(tile).attr("data-cd", $("#cd").val());
		$(tile).attr("data-hp", $("#hp").val());
                
                updateCastInput(tile);
	}
	var output;
	//unit(target, name, row, column, ap, cd, hp);
	function generateCode() {
		output = "";
		if ($("#time").val() != 90) {
			output += "timer("+$("#time").val()+");\n";
		}
		
		if ($("#start-p1").hasClass("success")) {
			output += "starts(P1);\n";
		}
		if ($("#start-p2").hasClass("success")) {
			output += "starts(P2);\n";
		}
                
                if($("#nowildlmt").hasClass("success")) {
                        output += "limitlessWild();\n";
                }
		
		if ($("#resources-player-one").val() != "") {
			output += "resources(P1, " + $("#resources-player-one").val() + ");\n";
		}
                
                if($("#more-resources-player-one").hasClass("success")) {
                        if($("#decay-player-one").val() != "") {
                            output += "resources(P1, decay, " + $("#decay-player-one").val() + ");\n";
                        }
                        if($("#energy-player-one").val() != "") {
                            output += "resources(P1, energy, " + $("#energy-player-one").val() + ");\n";
                        }
                        if($("#growth-player-one").val() != "") {
                            output += "resources(P1, growth, " + $("#growth-player-one").val() + ");\n";
                        }
                        if($("#order-player-one").val() != "") {
                            output += "resources(P1, order, " + $("#order-player-one").val() + ");\n";
                        }
                        if($("#special-player-one").val() != "") {
                            output += "resources(P1, special, " + $("#special-player-one").val() + ");\n";
                        }
                }
                
		if ($("#resources-player-two").val() != "") {
			output += "resources(P2, " + $("#resources-player-two").val() + ");\n";
		}
                
                if($("#more-resources-player-two").hasClass("success")) {
                        if($("#decay-player-two").val() != "") {
                            output += "resources(P2, decay, " + $("#decay-player-two").val() + ");\n";
                        }
                        if($("#energy-player-two").val() != "") {
                            output += "resources(P2, energy, " + $("#energy-player-two").val() + ");\n";
                        }
                        if($("#growth-player-two").val() != "") {
                            output += "resources(P2, growth, " + $("#growth-player-two").val() + ");\n";
                        }
                        if($("#order-player-two").val() != "") {
                            output += "resources(P2, order, " + $("#order-player-two").val() + ");\n";
                        }
                        if($("#special-player-two").val() != "") {
                            output += "resources(P2, special, " + $("#special-player-two").val() + ");\n";
                        }
                }
		//resources(target, amount);
		
		$(tiles).each(function() {
			if (getUnit(this) != "") {
				if (getBoss(this) == 1) {
						output += "boss("+getPlayer(this)+", " + getUnit(this) + ", " + getRow(this) + ", " + getCol(this) + ", " + (getAp(this) != "" ? getAp(this) : "0") + ", " + (getHp(this) != "" ? getHp(this) : "0") + ", " + getSelect(this) + ");\n";
					
				} else {
					if (getAp(this) != "" || getHp(this) != "" || getCd(this) != "") {
						output += "unit("+getPlayer(this)+", " + getUnit(this) + ", " + getRow(this) + ", " + getCol(this) + ", " + (getAp(this) != "" ? getAp(this) : "0") + ", " + (getCd(this) != "" ? getCd(this) : "0") + ", " + (getHp(this) != "" ? getHp(this) : "0") + ");\n";
					} else {
						output += "unit("+getPlayer(this)+", " + getUnit(this) + ", " + getRow(this) + ", " + getCol(this) + ");\n";
					}
				}
				
				
			}
		});
                
                $(".playcard").each(function() {
                    var parent = this.parentNode;
                    output += "playCard(" + getPlayer(parent) + ", " + this.getAttribute("data-card").replace(",", "\,") + ", " + getRow(parent) + ", " + getCol(parent) + (this.getAttribute("data-played") != "" ? ", " + this.getAttribute("data-played") : "") + ");\n";
                });
		
		//buffUnitCreated(target, enchantmentName);
		//<li id="idEnchant-1" data-player="'+player+'" data-enchantment="'+enchantName+'"
		
		$("#enchants-list li").each(function() {
			output += "buffUnitCreated("+$(this).attr("data-player")+", "+$(this).attr("data-enchantment")+");\n";
		});
		
		//spell(target, name, everyRound);
		$("#spell-list li").each(function() {
			output += "spell("+$(this).attr("data-player")+", "+$(this).attr("data-spell")+", "+$(this).attr("data-round")+");\n";
		});
		
		
		if ($("#p1-idol-0").val() == $("#p1-idol-1").val() &&
		    $("#p1-idol-0").val() == $("#p1-idol-2").val() &&
		    $("#p1-idol-0").val() == $("#p1-idol-3").val() && 
		    $("#p1-idol-0").val() == $("#p1-idol-4").val()) {
		    
		    	 if ($("#p1-idol-0").val() != 10) {
					output += "idols(P1, " + $("#p1-idol-0").val() + ");\n";
				 }
		} else {
		
			$("[id^=p1-idol]").each(function() {
				if ($(this).val() != 10) {
					output += "idol(P1, " + $(this).parent().attr("data-row") + ", " + $(this).val() + ");\n";
				}
			});
		}
		
		if ($("#p2-idol-0").val() == $("#p2-idol-1").val() &&
		    $("#p2-idol-0").val() == $("#p2-idol-2").val() &&
		    $("#p2-idol-0").val() == $("#p2-idol-3").val() && 
		    $("#p2-idol-0").val() == $("#p2-idol-4").val()) {
		    
		    if ($("#p2-idol-0").val() != 10) {
		    	output += "idols(P2, " + $("#p2-idol-0").val() + ");\n";
		    }
			
		} else {
			
			$("[id^=p2-idol]").each(function() {
				if ($(this).val() != 10) {
					output += "idol(P2, " + $(this).parent().attr("data-row") + ", " + $(this).val() + ");\n";
				}
			});
		}
		
		$("#output").text(output);
	}
	
	$("#genCode").click(function() {
		generateCode();
	});
        
});
<?php 

$arrayString = array();
$mapScrollKind = array();

$query = $deck->_db->prepare("SELECT name, id, kind FROM scrollsCard WHERE kind = 'CREATURE' OR kind = 'STRUCTURE'");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	array_push($arrayString, $row['name']);
        $mapScrollKind[$row['name']] = $row['kind'];
}


$arrayStringEnchant = array();

$query = $deck->_db->prepare("SELECT name, id, kind FROM scrollsCard WHERE kind = 'ENCHANTMENT'");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	array_push($arrayStringEnchant, $row['name']);
        $mapScrollKind[$row['name']] = $row['kind'];
}

$arrayStringSpells = array();

$query = $deck->_db->prepare("SELECT name, id, kind FROM scrollsCard WHERE kind = 'SPELL'");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	array_push($arrayStringSpells, $row['name']);
        $mapScrollKind[$row['name']] = $row['kind'];
}

$arrayStringUnocc = array();

$query = $deck->_db->prepare("SELECT name, id FROM scrollsCard WHERE kind != 'ENCHANTMENT' AND targetarea != 'TILE' AND targetarea != 'SEQUENTIAL'");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	array_push($arrayStringUnocc, $row['name']);
}

$arrayStringOcc = array();

$query = $deck->_db->prepare("SELECT name, id FROM scrollsCard WHERE kind != 'CREATURE' AND kind != 'STRUCTURE'");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	array_push($arrayStringOcc, $row['name']);
}

 ?>
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
	var enchant = <?php echo json_encode($arrayStringEnchant) ?>;
	var spells = <?php echo json_encode($arrayStringSpells) ?>;
        var unocc = <?php echo json_encode($arrayStringUnocc) ?>;
        var occ = <?php echo json_encode($arrayStringOcc) ?>;
        scrolltypes = <?php echo json_encode($mapScrollKind) ?>;
	 
	$('#unit').typeahead({
	  hint: false,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'scrolls',
	  displayKey: 'value',
	  source: substringMatcher(scrolls)
	});
	
	$('#enchant-text').typeahead({
	  hint: false,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'enchant',
	  displayKey: 'value',
	  source: substringMatcher(enchant)
	});
	$('#spells-text').typeahead({
	  hint: false,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'spells',
	  displayKey: 'value',
	  source: substringMatcher(spells)
	});
        
        $('#scrolls-text-unocc').typeahead({
           hint: false,
           highlight: true,
           minLength: 1
        },
        {
           name: 'all',
           displayKey: 'value',
           source: substringMatcher(unocc)
        });
        
        $('#scrolls-text-occ').typeahead({
           hint: false,
           highlight: true,
           minLength: 1
        },
        {
           name: 'all',
           displayKey: 'value',
           source: substringMatcher(occ)
        });
});
</script>
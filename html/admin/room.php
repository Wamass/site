		<div class="col-lg-12">
            <div class="panel panel-default" style="height:50px;">
				<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong>Groupes: <?php echo $chatrow['chat_name']; ?></strong></span>
				<div class="pull-right" style="margin-right:10px; margin-top:7px;">
					<span id="user_details" style="font-size:18px; position:relative; top:2px;"><strong>Membres: </strong><span class="badge"><?php echo mysqli_num_rows($cmem); ?></span></span>
					<a href="#add_member" data-toggle="modal" class="btn btn-primary">Ajouter un membre</a>
					<a href="#delete_room" data-toggle="modal" class="btn btn-danger">Supprimer groupe</a>
					<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
				</div>
				<div class="showme hidden" style="position: absolute; left:570px; top:20px;">
					<div class="well">
						<strong>Membres du groupe:</strong>
						<div style="height: 10px;"></div>
					<?php
						$rm=mysqli_query($conn,"select * from chat_member left join `user` on user.userid=chat_member.userid where chatroomid='$id'");
						while($rmrow=mysqli_fetch_array($rm)){
							?>
							<span>
							<?php
								$creq=mysqli_query($conn,"select * from chatroom where chatroomid='$id'");
								$crerow=mysqli_fetch_array($creq);
								
								if ($crerow['userid']==$rmrow['userid']){
									?>
										<span class="glyphicon glyphicon-user"></span>
									<?php
								}
								
							?>
							<?php echo $rmrow['uname']; ?></span><br>
							<?php
						}
						
					?>
						
					</div>
				</div>
			</div>
			<div>
				<div class="panel panel-default" style="height: 400px;">
					<div style="height:10px;"></div>
					<span style="margin-left:10px;">Bienvenue sur Chatroom</span><br>
					<span style="font-size:10px; margin-left:10px;"><i>Remarque: évitez d’utiliser un langage grossier et des propos haineux pour ne pas interdire les comptes.</i></span>
					<div style="height:10px;"></div>
					<div id="chat_area" style="margin-left:10px; max-height:320px; overflow-y:scroll;">
					</div>
				</div>
				
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Type message..." id="chat_msg">
					<span class="input-group-btn">
					<button class="btn btn-success" type="submit" id="send_msg" value="<?php echo $id; ?>">
					<span class="glyphicon glyphicon-comment"></span> Envoyer
					</button>
					</span>
				</div>
				
			</div>			
		</div>
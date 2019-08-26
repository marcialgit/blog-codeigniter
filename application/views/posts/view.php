<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
<div class="post-body">
	<?php echo $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
	<hr>
	<div class="row">
		<div class="col-md-1">
			<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Editar</a>
		</div>
		<div class="col-md-1 col-md-offset-10">
			<?php echo form_open('/posts/delete/'.$post['id']); ?>
				<input type="submit" value="Eliminar" class="btn btn-danger">
			</form>
		</div>
	</div>

<?php endif; ?>
<hr>
<h3>Commentarios</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) : ?>
		<div class="well">
			<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>No hay comentarios que visualizar</p>
<?php endif; ?>
<hr>
<h3>Agregar comentario</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
	<div class="form-group">
		<label>Nombre</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Correo Electrónico</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Contenido del comentario</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
	<button class="btn btn-primary" type="submit">Guardar</button>
</form>

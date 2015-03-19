
{% extends "base.html" %}

{% block content %}
	<div>
		<h1>Nuevo Usuario</h1>
	</div>
	<hr>

	<div class="row">
		<form class="form-horizontal" method="POST" action="{{ urlFor('user_save') }}">
		  <div class="form-group">
		    <label for="email" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="password" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="name" class="col-sm-2 control-label">Nombre</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="last_name" class="col-sm-2 control-label">Apellidos</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellidos">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="address" class="col-sm-2 control-label">Direccion</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="address" id="address" placeholder="Direccion">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="photo" class="col-sm-2 control-label">Foto</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="photo" id="photo" placeholder="Foto">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="group" class="col-sm-2 control-label">Grupo</label>
		    <div class="col-sm-10">
		      <select name="group" id="group" class="form-control">
				  <option value="">Elija un grupo</option>
				  {% for group in groups %}
				  	<option value="{{ group.id }}">{{ group.name }}</option>
				  {% endfor %}
				</select>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Registrar</button>
		      <a href="{{ urlFor('user_list') }}" class="btn btn-default">Cancelar</a>
		    </div>
		  </div>

		</form>
	</div>
{% endblock %}

{% extends "base.html" %}

{% block content %}
	<div>
		<h1>Actualizar Usuario</h1>
	</div>
	<hr>
	<div class="row">
		<form class="form-horizontal" method="PUT" action="{{ urlFor('user_update', {'user_id': user.id}) }}">
		  <div class="form-group">
		    <label for="email" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" value={{ user.email }} class="form-control" name="email" id="email" placeholder="Email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="name" class="col-sm-2 control-label">Nombre</label>
		    <div class="col-sm-10">
		      <input type="text" value={{ user.name }} class="form-control" name="name" id="name" placeholder="Nombre">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="last_name" class="col-sm-2 control-label">Apellidos</label>
		    <div class="col-sm-10">
		      <input type="text" value={{ user.last_name }} class="form-control" name="last_name" id="last_name" placeholder="Apellidos">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="address" class="col-sm-2 control-label">Direccion</label>
		    <div class="col-sm-10">
		      <input type="text" value={{ user.address }} class="form-control" name="address" id="address" placeholder="Direccion">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="photo" class="col-sm-2 control-label">Foto</label>
		    <div class="col-sm-10">
		      <input type="text" value={{ user.photo }} class="form-control" name="photo" id="photo" placeholder="Foto">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="group" class="col-sm-2 control-label">Grupo</label>
		    <div class="col-sm-10">
		      <select name="group" id="group" class="form-control">
				  {% for group in groups %}
				  	{% if group.id  != user.group_id %}
				  		<option value="{{ group.id }}">{{ group.name }}</option>
				  	{% else %}
				  		<option default value="{{ group.id }}">{{ group.name }}</option>
				  	{% endif %}
				  {% endfor %}
				</select>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" id="update" class="btn btn-default">Actualizar</button>
		      <a href="{{ urlFor('user_list') }}" class="btn btn-default">Cancelar</a>
		    </div>
		  </div>

		</form>
	</div>
{% endblock %}


{% block scripts %}

<script type="text/javascript">
	$(document).on("ready", function(){

		$("#update").on("click", function(event){
			event.preventDefault()
			var user_id = {{ user.id }},
				url = "{{ urlFor('user_update', {'user_id': ':user_id'}) }}",
				data = {
					email: $('#email').val(),
					name: $('#name').val(),
					last_name: $('#last_name').val(),
					address: $('#address').val(),
					photo: $('#photo').val(),
					group_id: $('#group').val()
				};
				url = url.replace(":user_id", user_id);
			$.ajax({
			    url: url,
			    data: data,
			    type: 'PUT',
			    success: function(result) {
			    	debugger
			        result = JSON.parse(result);
			        if(result.status){
			        	window.location.href = "{{ urlFor('user_list') }}";
			        } else {
			        	alert(result.message)
			        }
			    }
			});
		})

	})
</script>

{% endblock %}
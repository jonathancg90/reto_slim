
{% extends "base.html" %}

{% block content %}
	<div>
		<h1>Usuarios</h1>
		<a href="{{ urlFor('new_user') }}" class="btn btn-primary">Crear</a>
	</div>
	<hr>
	<table class="table">
		<tr>
			<thead>
				<th>Email</th>
				<th>Name</th>
				<th>Last Name</th>
				<th>Opciones</th>
			</thead>
		</tr>
		{% for user in users %}
		<tr>
			<tbody>
				<td>{{ user.email }}</td>
				<td>{{ user.name }}</td>
				<td>{{ user.last_name }}</td>
				<td>
					<a href="{{ urlFor('edit_user', {'user_id': user.id }) }}">Actualizar</a> |
					<a class="delete" data-id='{{ user.id }}' href="#" >Eliminar</a>
				</td>
			</tbody>
		</tr>
		{% endfor %}
	</table>

{% endblock %}

{% block scripts %}

<script type="text/javascript">
	$(document).on("ready", function(){

		$(".delete").on("click", function(event){
			event.preventDefault()
			var user_id = $(this).data("id");
			var url = "{{ urlFor('user_delete', {'user_id': ':user_id'}) }}";
				url = url.replace(":user_id", user_id);
			$.ajax({
			    url: url,
			    type: 'DELETE',
			    success: function(result) {
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
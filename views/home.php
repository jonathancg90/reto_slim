
{% extends "base.html" %}

{% block content %}
	<form class="form-horizontal" method="post" action="{{ urlFor('login') }}">
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Login</button>
	    </div>
	  </div>
	</form>
{% endblock %}
{% extends 'layouts/main.volt' %}

{% block title %}Slayer - Sample Login Form{% endblock %}

{% block header %}
<style type="text/css">
    .marginTop {
        margin-top:5vw;
    }
</style>
{% endblock %}

{% block content %}
    <div class="marginTop"></div>
    <div class="col-sm-4 col-sm-offset-4">

            {# Success Message #}
            {% if di().get('flash').has('success')  %}
                <div class="alert alert-success">
                    {{ di().get('flash').get('success') }}
                </div>
            {% endif %}

            {# Error Messages #}
            {% if di().get('flash').has('error')  %}
                <div class="alert alert-danger">
                    {{ di().get('flash').get('error') }}
                </div>
            {% endif %}

            {# Any when using FlashBag #}
            {{ flash_bag.output() }}

            <hr>
            <form class="form-vertical" method="POST" action="{{ route('attemptToLogin') }}" autocomplete="off">
                {{ csrf_field() }}

                <input type="hidden" name="ref" value="{{ request().get('ref') }}"> 

                <div class="form-group">
                    <label>{{ lang.get('auth.login.email_label') }}</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>{{ lang.get('auth.login.password_label') }}</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="pull-left">
                    <a href="<?php echo $this->url->get(['for' => 'showRegistrationForm']) ?>" class="btn btn-info">{{ lang.get('auth.button.register_button') }}</a>
                    <a href="" class="disabled btn btn-danger">{{ lang.get('auth.button.forgot_button') }}</a>
                </div>

                <div class="pull-right">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> {{ lang.get('auth.button.login_button') }}</button>
                </div>
            </form>
    </div>
    <div class="clearfix"></div>
{% endblock %}

{% block footer %}
<script type="text/javascript"></script>
{% endblock %}
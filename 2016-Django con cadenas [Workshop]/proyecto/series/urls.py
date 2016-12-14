# -*- coding: utf-8 -*-
from django.conf.urls import url
from . import views

urlpatterns = [
    
    url(r'^hola-mundo/$', views.hola_mundo),
    
    url(r'^hola-mundo-con-template/$', views.hola_mundo_con_template),
    
    url(r'^home/$', views.home),
    url(r'^$', views.home),

    url(r'^serie/$', views.listar_series, name='listar-series'),
    url(r'^serie/agregar/$', views.agregar_serie, name='agregar-serie'),
    url(r'^serie/editar/(?P<id_serie>\d+)/$', views.editar_serie, name='editar-serie'),
    url(r'^serie/eliminar/(?P<id_serie>\d+)/$', views.eliminar_serie, name='eliminar-serie'),

    url(r'^personaje/$', views.listar_personajes, name='listar-personajes'),
    url(r'^personaje/agregar/$', views.agregar_personaje, name='agregar-personaje'),
    url(r'^personaje/editar/(?P<id_personaje>\d+)/$', views.editar_personaje, name='editar-personaje'),
    url(r'^personaje/eliminar/(?P<id_personaje>\d+)/$', views.eliminar_personaje, name='eliminar-personaje'),
]

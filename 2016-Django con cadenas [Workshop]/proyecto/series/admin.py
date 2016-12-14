# -*- coding: utf-8 -*-
from django.contrib import admin
from .models import Serie
#from .forms import SerieForm

# Register your models here.

class SerieAdmin(admin.ModelAdmin):
    list_display = ['nombre', 'es_animada']
    #form = SerieForm # para la creacion de series, sino invoca todos los atributos
    # class Meta:
    #     model = Serie

admin.site.register(Serie, SerieAdmin)

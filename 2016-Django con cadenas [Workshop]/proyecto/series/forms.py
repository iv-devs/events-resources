# -*- coding: utf-8 -*-
from django import forms
from .models import Serie, Personaje


class SerieForm(forms.ModelForm):

    class Meta:
        model = Serie
        #fields = ['nombre', 'fecha',]
        exclude = []


class PersonajeForm(forms.ModelForm):

    class Meta:
        model = Personaje
        fields = ['nombre', 'sexo', 'serie', 'imagen']
        #exclude = []

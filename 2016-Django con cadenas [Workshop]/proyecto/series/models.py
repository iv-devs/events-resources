# -*- coding: utf-8 -*-

from django.db import models

# Create your models here.

class Serie(models.Model):
    nombre = models.CharField(max_length=30, unique=True)
    fecha = models.DateField(blank=True, null=True)
    imagen = models.ImageField(blank=True, upload_to='serie/')
    es_animada = models.BooleanField(blank=True)
    created = models.DateTimeField(auto_now_add=True)
    updated = models.DateTimeField(auto_now=True)

    def __unicode__(self):
        return '{}'.format(self.nombre)


class Personaje(models.Model):
    nombre = models.CharField(max_length=30)
    imagen = models.ImageField(blank=True, upload_to='serie/')
    serie = models.ForeignKey(Serie, on_delete=models.CASCADE)
    SEXO_CHOICES = (
        ('HOM', 'Hombre'),
        ('MUJ', 'Mujer'),
        ('OTR', 'Otro'),
    )
    sexo = models.CharField(
        max_length=3,
        choices=SEXO_CHOICES,
        #default='HOM',
    )
    created = models.DateTimeField(auto_now_add=True)
    updated = models.DateTimeField(auto_now=True)

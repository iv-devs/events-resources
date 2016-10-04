# -*- coding: utf-8 -*-
# Generated by Django 1.10.1 on 2016-09-22 03:31
from __future__ import unicode_literals

from django.db import migrations, models
import django.utils.timezone


class Migration(migrations.Migration):

    dependencies = [
        ('series', '0004_auto_20160922_0106'),
    ]

    operations = [
        migrations.AddField(
            model_name='serie',
            name='created',
            field=models.DateTimeField(auto_now_add=True, default=django.utils.timezone.now),
            preserve_default=False,
        ),
        migrations.AddField(
            model_name='serie',
            name='updated',
            field=models.DateTimeField(auto_now=True),
        ),
    ]
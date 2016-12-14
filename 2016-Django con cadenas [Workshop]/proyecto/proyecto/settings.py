"""
Django settings for proyecto project.

Generated by 'django-admin startproject' using Django 1.9.5.

For more information on this file, see
https://docs.djangoproject.com/en/1.9/topics/settings/

For the full list of settings and their values, see
https://docs.djangoproject.com/en/1.9/ref/settings/
"""

import os

# Build paths inside the project like this: os.path.join(BASE_DIR, ...)
BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))


# Quick-start development settings - unsuitable for production
# See https://docs.djangoproject.com/en/1.9/howto/deployment/checklist/

# SECURITY WARNING: keep the secret key used in production secret!
SECRET_KEY = '!gi=!8asf3j$jqx5wmylc5=!(l2a)+iz=ein+in16ut(gy!+)0'

# SECURITY WARNING: don't run with debug turned on in production!
DEBUG = True #DEBUG = False

ALLOWED_HOSTS = [] #ALLOWED_HOSTS = ['*',]


# Application definition

INSTALLED_APPS = [
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
    'series',
    'debug_toolbar',
]

MIDDLEWARE_CLASSES = [
    'django.middleware.security.SecurityMiddleware',
    'django.contrib.sessions.middleware.SessionMiddleware',
    'django.middleware.common.CommonMiddleware',
    'django.middleware.csrf.CsrfViewMiddleware',
    'django.contrib.auth.middleware.AuthenticationMiddleware',
    'django.contrib.auth.middleware.SessionAuthenticationMiddleware',
    'django.contrib.messages.middleware.MessageMiddleware',
    'django.middleware.clickjacking.XFrameOptionsMiddleware',
]

ROOT_URLCONF = 'proyecto.urls'

TEMPLATES = [
    {
        'BACKEND': 'django.template.backends.django.DjangoTemplates',
        'DIRS': [],
        'APP_DIRS': True,
        'OPTIONS': {
            'context_processors': [
                'django.template.context_processors.debug',
                'django.template.context_processors.request',
                'django.contrib.auth.context_processors.auth',
                'django.contrib.messages.context_processors.messages',
                'django.template.context_processors.media', # >= 1.8
            ],
        },
    },
]

WSGI_APPLICATION = 'proyecto.wsgi.application'


# Database
# https://docs.djangoproject.com/en/1.9/ref/settings/#databases

DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.mysql', # postgresql, mysql, sqlite3, oracle
        'NAME': 'proyecto_django', #os.path.join(BASE_DIR, 'db.sqlite3'),
        'USER': 'root',
        'PASSWORD': '12345',
        'HOST': '127.0.0.1', # 127.0.0.1, localhost, ...
        'PORT': '3306', # 3306 (mysql), 5432 (postgresql), ...
    }
}


# Password validation
# https://docs.djangoproject.com/en/1.9/ref/settings/#auth-password-validators

AUTH_PASSWORD_VALIDATORS = [
    {
        'NAME': 'django.contrib.auth.password_validation.UserAttributeSimilarityValidator',
    },
    {
        'NAME': 'django.contrib.auth.password_validation.MinimumLengthValidator',
    },
    {
        'NAME': 'django.contrib.auth.password_validation.CommonPasswordValidator',
    },
    {
        'NAME': 'django.contrib.auth.password_validation.NumericPasswordValidator',
    },
]


# Internationalization
# https://docs.djangoproject.com/en/1.9/topics/i18n/

LANGUAGE_CODE = 'es-ES'

TIME_ZONE = 'America/Santiago'

USE_I18N = True

USE_L10N = True

USE_TZ = False


# Static files (CSS, JavaScript, Images)
# https://docs.djangoproject.com/en/1.9/howto/static-files/

# url en navegador
STATIC_URL = '/static/'

# storage folder in production (DEBUG=False)
# STATIC_ROOT = C:\PythonProjects\proyecto-django\static
STATIC_ROOT = os.path.join(os.path.dirname(BASE_DIR), 'static')

# storage folder in testing (DEBUG=True)
STATICFILES_DIRS = (
    # C:\PythonProjects\proyecto-django\proyecto\
    os.path.join(BASE_DIR, 'static'),
)

# Media files

MEDIA_URL = '/media/'

# MEDIA_ROOT =  C:\PythonProjects\proyecto-django\media
MEDIA_ROOT = os.path.join(os.path.dirname(BASE_DIR), 'media')

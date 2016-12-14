from django.contrib.auth.decorators import login_required
from django.http import HttpResponse
from django.shortcuts import render, redirect, get_object_or_404
from .models import Serie, Personaje
from .forms import SerieForm, PersonajeForm


# Create your views here.

def hola_mundo(request):
    return HttpResponse('hola mundo en django')


def hola_mundo_con_template(request):
    return render(request, 'hola-mundo.html')


def home(request):
    context = {
        'titulo': 'Inicio',
    }
    return render(request, 'home.html', context)


def listar_series(request):
    series = Serie.objects.all()
    context = {
        'series': series,
    }
    return render(request, 'listar-series.html', context)


def agregar_serie(request):
    if request.method == 'POST':
        form = SerieForm(request.POST, request.FILES)
        if form.is_valid():
            form.save()
            return redirect('listar-series')
    else:
        form = SerieForm()
    context = {
        'form': form,
        'titulo': 'Agregar',
    }
    return render(request, 'agregar-serie.html', context)


def editar_serie(request, id_serie):
    print "editar serie", id_serie
    serie = get_object_or_404(Serie, id=id_serie)
    if request.method == 'POST':
        form = SerieForm(request.POST, request.FILES, instance=serie)
        if form.is_valid():
            form.save()
            return redirect('listar-series')
    else:
        form = SerieForm(instance=serie)
    context = {
        'form': form,
        'titulo': 'Editar',
    }
    return render(request, 'editar-serie.html', context)


def eliminar_serie(request, id_serie):
    serie = get_object_or_404(Serie, id=id_serie)
    if request.method == 'POST':
        serie.delete()
        return redirect('listar-series')
    context = {
        'serie': serie,
        'titulo': 'Eliminar',
    }
    return render(request, 'eliminar-serie.html', context)


#@login_required(login_url=reverse_lazy('login'))
#@login_required
def listar_personajes(request):
    personajes = Personaje.objects.all()
    #personajes = Personaje.objects.select_related('serie')
    #personajes = Personaje.objects.select_related('serie').values('id', 'nombre', 'sexo').order_by('-nombre')
    return render(request, 'listar-personajes.html', {
        'personajes': personajes,
    })


def agregar_personaje(request):
    if request.method == 'POST':
        form = PersonajeForm(request.POST, request.FILES)
        if form.is_valid():
            form.save()
            return redirect('listar-personajes')
    else:
        form = PersonajeForm()
    return render(request, 'agregar-personaje.html', {
        'form': form,
        'titulo': 'Agregar personaje',
    })


def editar_personaje(request, id_personaje):
    print "editar personaje", id_personaje
    personaje = get_object_or_404(Personaje, id=id_personaje)
    if request.method == 'POST':
        form = PersonajeForm(request.POST, request.FILES, instance=personaje)
        if form.is_valid():
            form.save()
            return redirect('listar-personajes')
    else:
        form = PersonajeForm(instance=personaje)
    context = {
        'form': form,
        'titulo': 'Editar personaje',
    }
    return render(request, 'editar-personaje.html', context)


def eliminar_personaje(request, id_personaje):
    personaje = get_object_or_404(Personaje, id=id_personaje)
    if request.method == 'POST':
        personaje.delete()
        return redirect('listar-personajes')
    context = {
        'personaje': personaje,
        'titulo': 'Eliminar',
    }
    return render(request, 'eliminar-personaje.html', context)

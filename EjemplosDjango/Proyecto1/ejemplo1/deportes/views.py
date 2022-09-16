from django.shortcuts import render

# Create your views here.

from django.http import HttpResponse
from django.shortcuts import render
from deportes.models import Jugador

def index(request):
    return HttpResponse("Página inicio de deportes")

def index(request):
    emple = Jugador()
    cursor=emple.devolverdato()
    contexto = {
        'listado_empleados': cursor
    }
    return render(request, "deportes/JugadoresPrimera.html", contexto)

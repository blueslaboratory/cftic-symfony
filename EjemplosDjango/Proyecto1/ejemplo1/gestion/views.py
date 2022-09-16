from django.shortcuts import render

# Create your views here.

# 16/09/2022

# from django.http import *
from django.http import HttpResponse


def index(request):
    return HttpResponse("Pagina de inicio")

# http://127.0.0.1:8000/gestion/
def index(request):
    return render(request, "gestion/inicio.html")

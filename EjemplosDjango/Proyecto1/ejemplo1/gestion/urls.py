# 16/09/2022

from django.urls import path

from gestion import views

# cuando vayas a raiz, vete a views.py y ejecuta la funcion index, el 3er argumento es nombrar

urlpatterns = [
    path('', views.index, name='index')
]

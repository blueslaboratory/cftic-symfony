<%-- 
    Document   : HolaMundo
    Created on : 09-sep-2022, 11:40:55
    Author     : Mañanas
--%>

<!-- 02 - ENVIAR INFORMACION CONTROLADOR VISTA -->

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix="jstl" uri="http://java.sun.com/jstl/core_rt"%>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <!-- localhost:8000/holamundo.htm -->
        <h1>Hello World!</h1>
        <h4>Primera aplicación SPRING!!</h4>
        
        <!-- etiqueta jstl:out value="${mensaje}", hay que importar el paquete -->
        <h4><jstl:out value="${mensaje}"/></h4>
    </body>
</html>

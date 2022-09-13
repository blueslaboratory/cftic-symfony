using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

// Importar Empleado (importando la carpeta Models), en realidad es un acortamiento
// acortar la escritura hacia la clase
using ProyectoWebApi2.Models;

// 07/09/2022
// Un controlador debe de acabar siempre en Controllers

namespace ProyectoWebApi2.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class EmpleadosController : ControllerBase
    {
        // Sin el using ProyectoWebApi2.Models; no podemos acortar y seria asi
        // List<ProyectoWebApi2.Models.Empleado> listaEmpleados = new List<ProyectoWebApi2.Models.Empleado>();

        // Con el acortamiento:
        List<Empleado> listaEmpleados = new List<Empleado>();
        
        // Constructor
        // Antes de ejecutar cualquier metodo lo primero que hace es pasar por el constructor
        public EmpleadosController()
        {
            // crear el objeto empleado
            Empleado e1 = new Empleado();
            e1.id = 1;
            e1.apellido = "Alberto";
            e1.oficio = "Programaitor";
            e1.salario = 12345;

            // otra forma de crear el objeto empleado
            Empleado e2 = new Empleado { id = 2, apellido = "Floro", oficio = "Sex Symbol", salario = 12345 };
            Empleado e3 = new Empleado { id = 3, apellido = "Negro", oficio = "Demolisiones", salario = 12345 };
            Empleado e4 = new Empleado { id = 4, apellido = "Cerezo", oficio = "Analista", salario = 12345 };
            Empleado e5 = new Empleado { id = 5, apellido = "Salvatore", oficio = "Sistemeitor", salario = 12345 };

            // agregarlo a la lista
            listaEmpleados.Add(e1);
            listaEmpleados.Add(e2);
            listaEmpleados.Add(e3);
            listaEmpleados.Add(e4);
            listaEmpleados.Add(e5);
        }

        // https://localhost:44385/api/Empleados
        // https://proyectowebapi2.azurewebsites.net/api/Empleados
        // GET: api/Empleados
        [HttpGet]
        public List<Empleado> devolverDatos()
        {
            return listaEmpleados;
        }

        // https://localhost:44385/api/Empleados/2
        // https://proyectowebapi2.azurewebsites.net/api/Empleados/2
        [HttpGet("{id}")]
        public Empleado devolverEmpleado(int id)
        {
            // Esto es lambda, está en C, C++, Java, no se puede programar en prog asincrona sin lambdas
            // dice que va a subir un documento
            Empleado e = listaEmpleados.Find(z => z.id == id);
            return e;
        }


        // https://localhost:44385/api/Empleados/devolverPorId/2
        // https://proyectowebapi2.azurewebsites.net/api/Empleados/devolverPorId/2
        [HttpGet("[action]/{id}")]
        public List<Empleado> devolverPorId(int id)
        {
            List<Empleado> e = listaEmpleados.Where(z => z.id == id).ToList();

            return e;
        }
    }
}
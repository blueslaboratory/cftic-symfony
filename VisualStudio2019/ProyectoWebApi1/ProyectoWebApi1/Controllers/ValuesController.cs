using Microsoft.AspNetCore.Mvc;
using ProyectoWebApi1.Entities;
using System.Collections.Generic;
// en java aqui habia que agregar la clase, 
// pero aqui no hace falta agregar Personas.cs si estan a la misma altura,
// como lo hemos metido en una carpeta, hay que hacer un using de:
// using ProyectoWebApi1.Entities;

// using -> es el import

// 06/09/2022
// dar formato al documento: CTRL + K, CTRL + D
// ejecutar: IIS Express
// quitar los using que no usas: CTRL + R, CTRL + G 

// tras publicar en el servidor el proyecto, acceder concatenando:
// https://proyectowebapi1.azurewebsites.net/api/values/ciudad/Roma
// https://proyectowebapi1.azurewebsites.net/api/values/

// namespace -> java
namespace ProyectoWebApi1.Controllers
{
    // se pone api/NombreControlador
    // [Route("ejemplo/[controller]")]

    [Route("api/[controller]")]
    [ApiController]
    public class ValuesController : ControllerBase
    {
        // https://localhost:44319/api/values
        // GET api/values -> esto viene del Route
        // con esto Get está ya ocupado
        [HttpGet]
        public string mensaje()
        {
            return "blueslaboratory";
        }

        // https://localhost:44319/api/values/37
        // GET api/values/37
        // el nombre de la variable, "id", tiene que coincidir con 
        // el nombre de la variable, "id", de mensaje 2 
        [HttpGet("{id}")]
        public string mensaje2(int id)
        {
            return mensaje() + " tienes " + id + " años";
        }

        // Un metodo que recoja 2 parametros
        // https://localhost:44319/api/values/blues/laboratory
        // GET api/values/blues/laboratory
        [HttpGet("{a}/{b}")]
        public string mensaje3(string a, string b)
        {
            return "nombre:" + a + " apellido: " + b;
        }

        // action es una palabra reservada
        // action indica que entro con el nombre del metodo
        // https://localhost:44319/api/values/ciudad/Roma
        // GET api/values/ciudad/Roma
        [HttpGet("[action]/{c}")]
        public string ciudad(string c)
        {
            return "Ciudad: " + c;
        }

        public void operacionInterna()
        {

        }



        // 75 - CREACION DE UN WEB SERVICE RESTFUL
        List<Persona> listapersonas = new List<Persona>();

        // public ValuesController()
        public ValuesController()
        {
            Persona p = new Persona { IdPersona = 1, Nombre = "Lucia", Email = "lucia@gmail.com", Edad = 19 };
            this.listapersonas.Add(p);
            p = new Persona { IdPersona = 2, Nombre = "Adrian", Email = "adrian@gmail.com", Edad = 24 };
            this.listapersonas.Add(p);
            p = new Persona { IdPersona = 3, Nombre = "Alejandro", Email = "alejandro@gmail.com", Edad = 21 };
            this.listapersonas.Add(p);
            p = new Persona { IdPersona = 4, Nombre = "Sara", Email = "sara@gmail.com", Edad = 17 };
            this.listapersonas.Add(p);
        }

        [HttpGet("[action]")]
        // https://localhost:44319/api/values/GetPersonas
        // GET api/<controller>
        public List<Persona> GetPersonas()
        {
            return this.listapersonas;
        }

        [HttpGet("[action]/{id}")]
        // https://localhost:44319/api/values/GetPersona/3
        // GET api/<controller>/9
        public Persona GetPersona(int id)
        {
            Persona p = this.listapersonas.Find(z => z.IdPersona == id);
            return p;
        }
    }
}
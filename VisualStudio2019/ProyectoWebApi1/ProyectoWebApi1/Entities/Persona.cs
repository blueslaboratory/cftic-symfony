using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace ProyectoWebApi1.Entities
{
    public class Persona
    {
        // 06/09/2022
        // 75 - CREACION DE UN WEB SERVICE  RESTFUL
        // get; set; indica lectura; escritura
        public int IdPersona { get; set; }
        public String Nombre { get; set; }
        public String Email { get; set; }
        public int Edad { get; set; }
    }
}

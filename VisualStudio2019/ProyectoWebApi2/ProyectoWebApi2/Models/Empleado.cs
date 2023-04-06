using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace ProyectoWebApi2.Models
{
    public class Empleado
    {
        // 07/09/2022
        // shortcut: prop + darle 2 veces al tabulador
        // string 's' minuscula: tipo de dato
        // String 'S' mayuscula: clase, permite acceder a metodos
        
        public int id { get; set; }
        public String apellido { get; set; }
        public String oficio { get; set; }
        public int salario { get; set; }

    }
}

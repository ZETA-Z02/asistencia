# LISTA DE ENTIDADES



## E.personal 
- id_personal *(PK)*  --- INT 
- nombre   ----VARCAHR(50)
- apellido ------VARCHAR(50)
- sexo  *(UQ)*  -----VARCAHR(10) 
- dni *(UQ)*  ----INT(8)
- telefono *(UQ)* ----INT(9)
- direccion ----int(9)
- ciudad ----VARCAHR(30)
- id_cargo *(FK)*


### Loguin
- id_loguin *(PK)*  --- int
- id_tra  *(FK)* --- int
- usuario   ---VARCHAR(20)
- contraseña ---VARCAHR(20)
- id_cargo *(FK)*


### cargo
- id_cargo *(PK)* ---auto increment
- cargo o especialidad ---varchar(25) 
- pago por hora --- float
- planilla ----boolean
- nivel de usuario ----int(3)
- turno ---varchar(20)
- horas de trabajado --- int ()
  


### asistencia  
- id_loguin *(FK)* ----int
- id_asistencia *(PK)* ---int 
- salida y ingreso -----VARCHAR(15)
- fecha ----date 
- hora ----time




### Boleta 
- id_boleta *(PK)*
- id_tra *(FK)*
- id_cargo *(FK)*
- fecha ---datetime
- horas trabajadas
 

## relaciones 
1.




## Reglas de negocio 
### Personal
1.crear personal 
2.leer a todo el personal
3-leer un personal en particular
4.actualizar a un personal 
5.eliminar a un personal 

### loguin
1.crear login 
2.leer a todo el login
3-leer un login en particular
4.actualizar a un login 
5.eliminar a un login  

### cargo
1.crear cargo 
2.leer a todo el cargo
3-leer un cargo en particular
4.actualizar a un cargo 
5.eliminar a un cargo 

#### asistencia

1.crear asistencia 
2.leer a todo el asistencia
3-leer un asistencia en particular
4.actualizar a un asistencia 
5.eliminar a un asistencia 


### crear boleta 
1.crear boleta 
2.leer a t1odo el boleta
3-l1eer un boleta en particular
4.actualiza1r a un boleta 
5.elimina1r a un boleta 
6.cada que haya horas inasistidas restar horas trabajadas con horas de trabajo
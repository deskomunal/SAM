/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     12/04/2014 23:14:54                          */
/*==============================================================*/


drop table if exists activo_fijo;

drop table if exists categoria;

drop table if exists ciudad;

drop table if exists detalle_activo_fijo;

drop table if exists sucursal;

drop table if exists usuario;

/*==============================================================*/
/* Table: activo_fijo                                           */
/*==============================================================*/
create table activo_fijo
(
   idactivo             int not null,
   iddetactivo          int,
   idsucursal           int,
   numserial            varchar(30) not null,
   stock                int,
   primary key (idactivo)
);

/*==============================================================*/
/* Table: categoria                                             */
/*==============================================================*/
create table categoria
(
   idcategoria          int not null,
   nomcategoria         text not null,
   descategoria         text,
   primary key (idcategoria)
);

/*==============================================================*/
/* Table: ciudad                                                */
/*==============================================================*/
create table ciudad
(
   idciudad             int not null,
   ciudad               text not null,
   primary key (idciudad)
);

/*==============================================================*/
/* Table: detalle_activo_fijo                                   */
/*==============================================================*/
create table detalle_activo_fijo
(
   iddetactivo          int not null,
   idcategoria          int,
   nomdetactivo         text not null,
   desdetactivo         text not null,
   stock                int,
   primary key (iddetactivo)
);

/*==============================================================*/
/* Table: sucursal                                              */
/*==============================================================*/
create table sucursal
(
   idsucursal           int not null,
   idciudad             int,
   encargado            text not null,
   telefono             numeric(8,0),
   direccion            text,
   primary key (idsucursal)
);

/*==============================================================*/
/* Table: usuario                                               */
/*==============================================================*/
create table usuario
(
   iduser               int not null,
   login                varchar(50) not null,
   password             varchar(50) not null,
   tipo                 int,
   estado               bool,
   primary key (iduser)
);

alter table activo_fijo add constraint fk_relationship_4 foreign key (iddetactivo)
      references detalle_activo_fijo (iddetactivo) on delete restrict on update restrict;

alter table activo_fijo add constraint fk_relationship_5 foreign key (idsucursal)
      references sucursal (idsucursal) on delete restrict on update restrict;

alter table detalle_activo_fijo add constraint fk_relationship_6 foreign key (idcategoria)
      references categoria (idcategoria) on delete restrict on update restrict;

alter table sucursal add constraint fk_relationship_1 foreign key (idciudad)
      references ciudad (idciudad) on delete restrict on update restrict;


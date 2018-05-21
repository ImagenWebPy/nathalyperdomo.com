/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : nathaly_perdomo

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-05-20 12:25:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_rol
-- ----------------------------
DROP TABLE IF EXISTS `admin_rol`;
CREATE TABLE `admin_rol` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_rol
-- ----------------------------
INSERT INTO `admin_rol` VALUES ('1', 'Administrador', '1');
INSERT INTO `admin_rol` VALUES ('2', 'Editor', '1');
INSERT INTO `admin_rol` VALUES ('3', 'Consultorio', '1');

-- ----------------------------
-- Table structure for admin_usuario
-- ----------------------------
DROP TABLE IF EXISTS `admin_usuario`;
CREATE TABLE `admin_usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) unsigned NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `img` varchar(120) DEFAULT NULL,
  `contrasena` varchar(145) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_usuario
-- ----------------------------
INSERT INTO `admin_usuario` VALUES ('1', '1', 'Raúl Ramírez', 'raul.ramirez@imagenwebhq.com', null, 'b99248150e4cc14769a9f0989d17253082ed4a81da5e73d29014ae0eb68c2b72', '1');

-- ----------------------------
-- Table structure for ciudad
-- ----------------------------
DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_departamento` int(11) unsigned NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_id_departamento_ciudad` (`id_departamento`) USING BTREE,
  CONSTRAINT `fk_id_departamento_ciudad` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ciudad
-- ----------------------------
INSERT INTO `ciudad` VALUES ('1', '2', 'Arroyito', '1');
INSERT INTO `ciudad` VALUES ('2', '2', 'Azotey', '1');
INSERT INTO `ciudad` VALUES ('3', '2', 'Belén', '1');
INSERT INTO `ciudad` VALUES ('4', '2', 'Concepción', '1');
INSERT INTO `ciudad` VALUES ('5', '2', 'Horqueta', '1');
INSERT INTO `ciudad` VALUES ('6', '2', 'Loreto', '1');
INSERT INTO `ciudad` VALUES ('7', '2', 'Paso Barreto', '1');
INSERT INTO `ciudad` VALUES ('8', '2', 'San Alfredo', '1');
INSERT INTO `ciudad` VALUES ('9', '2', 'San Carlos del Apa', '1');
INSERT INTO `ciudad` VALUES ('10', '2', 'San Lázaro', '1');
INSERT INTO `ciudad` VALUES ('11', '2', 'Sargento Joé Feliz López', '1');
INSERT INTO `ciudad` VALUES ('12', '2', 'Yby Yaú', '1');
INSERT INTO `ciudad` VALUES ('13', '1', 'Asunción', '1');
INSERT INTO `ciudad` VALUES ('14', '3', 'Altos', '1');
INSERT INTO `ciudad` VALUES ('15', '3', 'Arroyos y Esteros', '1');
INSERT INTO `ciudad` VALUES ('16', '3', 'Atyrá', '1');
INSERT INTO `ciudad` VALUES ('17', '3', 'Caacupé', '1');
INSERT INTO `ciudad` VALUES ('18', '3', 'Caraguatay', '1');
INSERT INTO `ciudad` VALUES ('19', '3', 'Emboscada', '1');
INSERT INTO `ciudad` VALUES ('20', '3', 'Eusebio Ayala', '1');
INSERT INTO `ciudad` VALUES ('21', '3', 'Isla Pucú', '1');
INSERT INTO `ciudad` VALUES ('22', '3', 'Itacurubí de la Cordillera', '1');
INSERT INTO `ciudad` VALUES ('23', '3', 'Juan de Mena', '1');
INSERT INTO `ciudad` VALUES ('24', '3', 'Loma Grande', '1');
INSERT INTO `ciudad` VALUES ('25', '3', 'Mbocayaty del Yhaguy', '1');
INSERT INTO `ciudad` VALUES ('26', '3', 'Nueva Colombia', '1');
INSERT INTO `ciudad` VALUES ('27', '3', 'Pirebebuy', '1');
INSERT INTO `ciudad` VALUES ('28', '3', 'Primero de Marzo', '1');
INSERT INTO `ciudad` VALUES ('29', '3', 'San Bernardino', '1');
INSERT INTO `ciudad` VALUES ('30', '3', 'San José Obrero', '1');
INSERT INTO `ciudad` VALUES ('31', '3', 'Santa Elena', '1');
INSERT INTO `ciudad` VALUES ('32', '3', 'Tobatí', '1');
INSERT INTO `ciudad` VALUES ('33', '3', 'Valenzuela', '1');
INSERT INTO `ciudad` VALUES ('34', '4', 'Borja', '1');
INSERT INTO `ciudad` VALUES ('35', '4', 'Troche', '1');
INSERT INTO `ciudad` VALUES ('36', '4', 'Coronel Martínez', '1');
INSERT INTO `ciudad` VALUES ('37', '4', 'Dr. Bottrell', '1');
INSERT INTO `ciudad` VALUES ('38', '4', 'Félix Pérez Cardozo', '1');
INSERT INTO `ciudad` VALUES ('39', '4', 'Garay', '1');
INSERT INTO `ciudad` VALUES ('40', '4', 'Independencia', '1');
INSERT INTO `ciudad` VALUES ('41', '4', 'Itapé', '1');
INSERT INTO `ciudad` VALUES ('42', '4', 'Iturbe', '1');
INSERT INTO `ciudad` VALUES ('43', '4', 'Fassardi', '1');
INSERT INTO `ciudad` VALUES ('44', '4', 'Mbocayaty', '1');
INSERT INTO `ciudad` VALUES ('45', '4', 'Natalicio Talavera', '1');
INSERT INTO `ciudad` VALUES ('46', '4', 'Ñumi', '1');
INSERT INTO `ciudad` VALUES ('47', '4', 'Paso Yobai', '1');
INSERT INTO `ciudad` VALUES ('48', '4', 'San Salvador', '1');
INSERT INTO `ciudad` VALUES ('49', '4', 'Tebicuary', '1');
INSERT INTO `ciudad` VALUES ('50', '4', 'Villarrica', '1');
INSERT INTO `ciudad` VALUES ('51', '4', 'Yataity', '1');
INSERT INTO `ciudad` VALUES ('52', '5', 'Caaguazú', '1');
INSERT INTO `ciudad` VALUES ('53', '5', 'Carayaó', '1');
INSERT INTO `ciudad` VALUES ('54', '5', 'Coronel Oviedo', '1');
INSERT INTO `ciudad` VALUES ('55', '5', 'Doctor Cecilio Báez', '1');
INSERT INTO `ciudad` VALUES ('56', '5', 'Doctor Juan Eulogio Estigarribia', '1');
INSERT INTO `ciudad` VALUES ('57', '5', 'Doctor Juan Manuel Frutos', '1');
INSERT INTO `ciudad` VALUES ('58', '5', 'José Domingo Ocampos', '1');
INSERT INTO `ciudad` VALUES ('59', '5', 'La Pastora', '1');
INSERT INTO `ciudad` VALUES ('60', '5', 'Mariscal Francisco Solano Lopez', '1');
INSERT INTO `ciudad` VALUES ('61', '5', 'Nueva Londres', '1');
INSERT INTO `ciudad` VALUES ('62', '5', 'Nueva Toledo', '1');
INSERT INTO `ciudad` VALUES ('63', '5', 'Raúl Arsenio Oviedo', '1');
INSERT INTO `ciudad` VALUES ('64', '5', 'Regimiento de Infantería Tres Corrales', '1');
INSERT INTO `ciudad` VALUES ('65', '5', 'Repratriación', '1');
INSERT INTO `ciudad` VALUES ('66', '5', 'San Joaquín', '1');
INSERT INTO `ciudad` VALUES ('67', '5', 'San José de los Arroyos', '1');
INSERT INTO `ciudad` VALUES ('68', '5', 'Santa Rosa del Mbutuy', '1');
INSERT INTO `ciudad` VALUES ('69', '5', 'Simón Bolivar', '1');
INSERT INTO `ciudad` VALUES ('70', '5', 'Tembiaporá', '1');
INSERT INTO `ciudad` VALUES ('71', '5', 'Tres de Febrero', '1');
INSERT INTO `ciudad` VALUES ('72', '5', 'Vaquería', '1');
INSERT INTO `ciudad` VALUES ('73', '5', 'Yhú', '1');
INSERT INTO `ciudad` VALUES ('74', '6', 'Abai', '1');
INSERT INTO `ciudad` VALUES ('75', '6', 'Buena Vista', '1');
INSERT INTO `ciudad` VALUES ('76', '6', 'Caazapá', '1');
INSERT INTO `ciudad` VALUES ('77', '6', 'Doctor Moisés S. Bertoni', '1');
INSERT INTO `ciudad` VALUES ('78', '6', 'Fulgencio Yegros', '1');
INSERT INTO `ciudad` VALUES ('79', '6', 'General Higinio Morínigo', '1');
INSERT INTO `ciudad` VALUES ('80', '6', 'Maciel', '1');
INSERT INTO `ciudad` VALUES ('81', '6', 'San Juan Nepomuceno', '1');
INSERT INTO `ciudad` VALUES ('82', '6', 'Tavai', '1');
INSERT INTO `ciudad` VALUES ('83', '6', 'Tres de Mayo', '1');
INSERT INTO `ciudad` VALUES ('84', '6', 'Yuty', '1');
INSERT INTO `ciudad` VALUES ('85', '7', 'Alto Verá', '1');
INSERT INTO `ciudad` VALUES ('86', '7', 'Bella Vista', '1');
INSERT INTO `ciudad` VALUES ('87', '7', 'Cambyretá', '1');
INSERT INTO `ciudad` VALUES ('88', '7', 'Captián Meza', '1');
INSERT INTO `ciudad` VALUES ('89', '7', 'Capitán Miranda', '1');
INSERT INTO `ciudad` VALUES ('90', '7', 'Carmen del Paraná', '1');
INSERT INTO `ciudad` VALUES ('91', '7', 'Coronel José Félix Bogado', '1');
INSERT INTO `ciudad` VALUES ('92', '7', 'Edelira', '1');
INSERT INTO `ciudad` VALUES ('93', '7', 'Encarnación', '1');
INSERT INTO `ciudad` VALUES ('94', '7', 'Fram', '1');
INSERT INTO `ciudad` VALUES ('95', '7', 'General Artigas', '1');
INSERT INTO `ciudad` VALUES ('96', '7', 'General Delgado', '1');
INSERT INTO `ciudad` VALUES ('97', '7', 'Hohenau', '1');
INSERT INTO `ciudad` VALUES ('98', '7', 'Itapúa Poty', '1');
INSERT INTO `ciudad` VALUES ('99', '7', 'Jesús', '1');
INSERT INTO `ciudad` VALUES ('100', '7', 'José Leandro Oviedo', '1');
INSERT INTO `ciudad` VALUES ('101', '7', 'La Paz', '1');
INSERT INTO `ciudad` VALUES ('102', '7', 'Mayor Julio Dionisio Otaño', '1');
INSERT INTO `ciudad` VALUES ('103', '7', 'Natalio', '1');
INSERT INTO `ciudad` VALUES ('104', '7', 'Nueva Alborada', '1');
INSERT INTO `ciudad` VALUES ('105', '7', 'Obligado', '1');
INSERT INTO `ciudad` VALUES ('106', '7', 'Pirapó', '1');
INSERT INTO `ciudad` VALUES ('107', '7', 'San Cosme y Damián', '1');
INSERT INTO `ciudad` VALUES ('108', '7', 'San Juan del Paraná', '1');
INSERT INTO `ciudad` VALUES ('109', '7', 'San Pedro del Paraná', '1');
INSERT INTO `ciudad` VALUES ('110', '7', 'San Rafael del Paraná', '1');
INSERT INTO `ciudad` VALUES ('111', '7', 'Tomás Romero Pereira', '1');
INSERT INTO `ciudad` VALUES ('112', '7', 'Trinidad', '1');
INSERT INTO `ciudad` VALUES ('113', '7', 'Yatytay', '1');
INSERT INTO `ciudad` VALUES ('114', '8', 'Ayolas', '1');
INSERT INTO `ciudad` VALUES ('115', '8', 'San Ignacio', '1');
INSERT INTO `ciudad` VALUES ('116', '8', 'San Juan Bautista', '1');
INSERT INTO `ciudad` VALUES ('117', '8', 'San Miguel', '1');
INSERT INTO `ciudad` VALUES ('118', '8', 'San Patricio', '1');
INSERT INTO `ciudad` VALUES ('119', '8', 'Santa María', '1');
INSERT INTO `ciudad` VALUES ('120', '8', 'Santiago', '1');
INSERT INTO `ciudad` VALUES ('121', '8', 'Villa Florida', '1');
INSERT INTO `ciudad` VALUES ('122', '8', 'Yabebyry', '1');
INSERT INTO `ciudad` VALUES ('123', '9', 'Acahay', '1');
INSERT INTO `ciudad` VALUES ('124', '9', 'Caapucú', '1');
INSERT INTO `ciudad` VALUES ('125', '9', 'Carapeguá', '1');
INSERT INTO `ciudad` VALUES ('126', '9', 'Escobar', '1');
INSERT INTO `ciudad` VALUES ('127', '9', 'Gral. Bernardino Caballero', '1');
INSERT INTO `ciudad` VALUES ('128', '9', 'La Colmeda', '1');
INSERT INTO `ciudad` VALUES ('129', '9', 'María Antonia', '1');
INSERT INTO `ciudad` VALUES ('130', '9', 'Mbuyapey', '1');
INSERT INTO `ciudad` VALUES ('131', '9', 'Paraguarí', '1');
INSERT INTO `ciudad` VALUES ('132', '9', 'Pirayú', '1');
INSERT INTO `ciudad` VALUES ('133', '9', 'Quiindy', '1');
INSERT INTO `ciudad` VALUES ('134', '9', 'Quyquyhó', '1');
INSERT INTO `ciudad` VALUES ('135', '9', 'San Roque González de Santa Cruz', '1');
INSERT INTO `ciudad` VALUES ('136', '9', 'Sapucai', '1');
INSERT INTO `ciudad` VALUES ('137', '9', 'Tebicuarymi', '1');
INSERT INTO `ciudad` VALUES ('138', '9', 'Yaguarón', '1');
INSERT INTO `ciudad` VALUES ('139', '9', 'Ybycuí', '1');
INSERT INTO `ciudad` VALUES ('140', '9', 'Ybytymí', '1');
INSERT INTO `ciudad` VALUES ('141', '10', 'Ciudad del Este', '1');
INSERT INTO `ciudad` VALUES ('142', '10', 'Doctor Juan León Mallorquín', '1');
INSERT INTO `ciudad` VALUES ('143', '10', 'Doctor Raúl Peña', '1');
INSERT INTO `ciudad` VALUES ('144', '10', 'Domingo Martinez de Irala', '1');
INSERT INTO `ciudad` VALUES ('145', '10', 'Hernandarias', '1');
INSERT INTO `ciudad` VALUES ('146', '10', 'Iruña', '1');
INSERT INTO `ciudad` VALUES ('147', '10', 'Itakyry', '1');
INSERT INTO `ciudad` VALUES ('148', '10', 'Juan Emilio O\'Leary', '1');
INSERT INTO `ciudad` VALUES ('149', '10', 'Los Cedrales', '1');
INSERT INTO `ciudad` VALUES ('150', '10', 'Mbaracayú', '1');
INSERT INTO `ciudad` VALUES ('151', '10', 'Minga Guazú', '1');
INSERT INTO `ciudad` VALUES ('152', '10', 'Minga Porá', '1');
INSERT INTO `ciudad` VALUES ('153', '10', 'Naranjal', '1');
INSERT INTO `ciudad` VALUES ('154', '10', 'Ñacunday', '1');
INSERT INTO `ciudad` VALUES ('155', '10', 'Presidente Franco', '1');
INSERT INTO `ciudad` VALUES ('156', '10', 'San Alberto', '1');
INSERT INTO `ciudad` VALUES ('157', '10', 'San Cristobal', '1');
INSERT INTO `ciudad` VALUES ('158', '10', 'Santa Fe del Paraná', '1');
INSERT INTO `ciudad` VALUES ('159', '10', 'Santa Rita', '1');
INSERT INTO `ciudad` VALUES ('160', '10', 'Santa Rosa del Monday', '1');
INSERT INTO `ciudad` VALUES ('161', '10', 'Tavapy', '1');
INSERT INTO `ciudad` VALUES ('162', '10', 'Yguazú', '1');
INSERT INTO `ciudad` VALUES ('163', '11', 'Areguá', '1');
INSERT INTO `ciudad` VALUES ('164', '11', 'Capiatá', '1');
INSERT INTO `ciudad` VALUES ('165', '11', 'Fernando de la Mora', '1');
INSERT INTO `ciudad` VALUES ('166', '11', 'Guarambaré', '1');
INSERT INTO `ciudad` VALUES ('167', '11', 'Itá', '1');
INSERT INTO `ciudad` VALUES ('168', '11', 'Itauguá', '1');
INSERT INTO `ciudad` VALUES ('169', '11', 'Julián Augusto Saldívar', '1');
INSERT INTO `ciudad` VALUES ('170', '11', 'Lambaré', '1');
INSERT INTO `ciudad` VALUES ('171', '11', 'Limpio', '1');
INSERT INTO `ciudad` VALUES ('172', '11', 'Luque', '1');
INSERT INTO `ciudad` VALUES ('173', '11', 'Mariano Roque Alonso', '1');
INSERT INTO `ciudad` VALUES ('174', '11', 'Ñemby', '1');
INSERT INTO `ciudad` VALUES ('175', '11', 'Nueva Italia', '1');
INSERT INTO `ciudad` VALUES ('176', '11', 'San Antonio', '1');
INSERT INTO `ciudad` VALUES ('177', '11', 'San Lorenzo', '1');
INSERT INTO `ciudad` VALUES ('178', '11', 'Villa Elisa', '1');
INSERT INTO `ciudad` VALUES ('179', '11', 'Villeta', '1');
INSERT INTO `ciudad` VALUES ('180', '11', 'Ypacaraí', '1');
INSERT INTO `ciudad` VALUES ('181', '11', 'Ypané', '1');
INSERT INTO `ciudad` VALUES ('182', '12', 'Alberdi', '1');
INSERT INTO `ciudad` VALUES ('183', '12', 'Cerrito', '1');
INSERT INTO `ciudad` VALUES ('184', '12', 'Desmochados', '1');
INSERT INTO `ciudad` VALUES ('185', '12', 'General José Eduvigis Díaz', '1');
INSERT INTO `ciudad` VALUES ('186', '12', 'Guazú Cuá', '1');
INSERT INTO `ciudad` VALUES ('187', '12', 'Isla Umbú', '1');
INSERT INTO `ciudad` VALUES ('188', '12', 'Humaita', '1');
INSERT INTO `ciudad` VALUES ('189', '12', 'Laureles', '1');
INSERT INTO `ciudad` VALUES ('190', '12', 'Mayor Jose J. Martinez', '1');
INSERT INTO `ciudad` VALUES ('191', '12', 'Paso de Patria', '1');
INSERT INTO `ciudad` VALUES ('192', '12', 'Pilar', '1');
INSERT INTO `ciudad` VALUES ('193', '12', 'San Juan Bautista del Ñeembucú', '1');
INSERT INTO `ciudad` VALUES ('194', '12', 'Tacuaras', '1');
INSERT INTO `ciudad` VALUES ('195', '12', 'Villa Franca', '1');
INSERT INTO `ciudad` VALUES ('196', '12', 'Villa Oliva', '1');
INSERT INTO `ciudad` VALUES ('197', '12', 'Villalbín', '1');
INSERT INTO `ciudad` VALUES ('198', '13', 'Bella Vista', '1');
INSERT INTO `ciudad` VALUES ('199', '13', 'Capitán Bado', '1');
INSERT INTO `ciudad` VALUES ('200', '13', 'Pedro Juan Caballero', '1');
INSERT INTO `ciudad` VALUES ('201', '13', 'Zanja Pytá', '1');
INSERT INTO `ciudad` VALUES ('202', '13', 'Karapai', '1');
INSERT INTO `ciudad` VALUES ('203', '14', 'Corpus Christi', '1');
INSERT INTO `ciudad` VALUES ('204', '14', 'Curuguaty', '1');
INSERT INTO `ciudad` VALUES ('205', '14', 'General Francisco Caballero Alvarez', '1');
INSERT INTO `ciudad` VALUES ('206', '14', 'Itanará', '1');
INSERT INTO `ciudad` VALUES ('207', '14', 'Katueté', '1');
INSERT INTO `ciudad` VALUES ('208', '14', 'La Paloma', '1');
INSERT INTO `ciudad` VALUES ('209', '14', 'Maracaná', '1');
INSERT INTO `ciudad` VALUES ('210', '14', 'Nueva Esperanza', '1');
INSERT INTO `ciudad` VALUES ('211', '14', 'Salto del Guairá', '1');
INSERT INTO `ciudad` VALUES ('212', '14', 'Villa Ygatimí', '1');
INSERT INTO `ciudad` VALUES ('213', '14', 'Yasy Cañy', '1');
INSERT INTO `ciudad` VALUES ('214', '14', 'Yby Pytá', '1');
INSERT INTO `ciudad` VALUES ('215', '14', 'Ybyrarobaná', '1');
INSERT INTO `ciudad` VALUES ('216', '14', 'Ypejhu', '1');
INSERT INTO `ciudad` VALUES ('217', '15', 'Benjamín Aceval', '1');
INSERT INTO `ciudad` VALUES ('218', '15', 'Doctor José Falcón', '1');
INSERT INTO `ciudad` VALUES ('219', '15', 'General José María Bruguez', '1');
INSERT INTO `ciudad` VALUES ('220', '15', 'Nanawa', '1');
INSERT INTO `ciudad` VALUES ('221', '15', 'Puerto Pinasco', '1');
INSERT INTO `ciudad` VALUES ('222', '15', 'Teniente Primero Manuel Irala Fernández', '1');
INSERT INTO `ciudad` VALUES ('223', '15', 'Teniente Estaban Martínez', '1');
INSERT INTO `ciudad` VALUES ('224', '15', 'Villa Hayes', '1');
INSERT INTO `ciudad` VALUES ('225', '16', 'Bahía Negra', '1');
INSERT INTO `ciudad` VALUES ('226', '16', 'Capitán Carmelo Peralta', '1');
INSERT INTO `ciudad` VALUES ('227', '16', 'Fuerte Olimpo', '1');
INSERT INTO `ciudad` VALUES ('228', '16', 'Puerto Casado', '1');
INSERT INTO `ciudad` VALUES ('229', '17', 'Filadelfia', '1');
INSERT INTO `ciudad` VALUES ('230', '17', 'Loma Plata', '1');
INSERT INTO `ciudad` VALUES ('231', '17', 'Mariscal José Félix Estigarribia', '1');

-- ----------------------------
-- Table structure for departamento
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) DEFAULT NULL,
  `estado` int(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES ('1', 'Asunción', '1');
INSERT INTO `departamento` VALUES ('2', 'Concepción', '1');
INSERT INTO `departamento` VALUES ('3', 'San Pedro', '1');
INSERT INTO `departamento` VALUES ('4', 'Cordillera', '1');
INSERT INTO `departamento` VALUES ('5', 'Guairá', '1');
INSERT INTO `departamento` VALUES ('6', 'Caaguazú', '1');
INSERT INTO `departamento` VALUES ('7', 'Itapúa', '1');
INSERT INTO `departamento` VALUES ('8', 'Misiones', '1');
INSERT INTO `departamento` VALUES ('9', 'Paraguarí', '1');
INSERT INTO `departamento` VALUES ('10', 'Alto Paraná', '1');
INSERT INTO `departamento` VALUES ('11', 'Central', '1');
INSERT INTO `departamento` VALUES ('12', 'Ñeembucú', '1');
INSERT INTO `departamento` VALUES ('13', 'Amambay', '1');
INSERT INTO `departamento` VALUES ('14', 'Canindeyú', '1');
INSERT INTO `departamento` VALUES ('15', 'Presidente Hayes', '1');
INSERT INTO `departamento` VALUES ('16', 'Alto Paraguay', '1');
INSERT INTO `departamento` VALUES ('17', 'Boquerón', '1');

-- ----------------------------
-- Table structure for ficha_paciente
-- ----------------------------
DROP TABLE IF EXISTS `ficha_paciente`;
CREATE TABLE `ficha_paciente` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion_consulta` longtext,
  `receta` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ficha_paciente
-- ----------------------------

-- ----------------------------
-- Table structure for horarios
-- ----------------------------
DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_desde` date DEFAULT NULL,
  `fecha_hasta` date DEFAULT NULL,
  `hora_desde` time DEFAULT NULL,
  `hora_hasta` time DEFAULT NULL,
  `intervalo` int(2) unsigned DEFAULT NULL,
  `estado` int(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of horarios
-- ----------------------------

-- ----------------------------
-- Table structure for paciente
-- ----------------------------
DROP TABLE IF EXISTS `paciente`;
CREATE TABLE `paciente` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_documento` int(11) unsigned DEFAULT NULL,
  `id_ciudad` int(11) unsigned DEFAULT NULL,
  `documento` varchar(30) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `direccion` varchar(160) DEFAULT NULL,
  `barrio` varchar(60) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estado` int(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_email_paciente` (`email`) USING BTREE,
  KEY `fk_id_tipo_documento_paciente` (`id_tipo_documento`),
  KEY `fk_id_ciudad_paciente` (`id_ciudad`),
  CONSTRAINT `fk_id_ciudad_paciente` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_tipo_documento_paciente` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of paciente
-- ----------------------------
INSERT INTO `paciente` VALUES ('1', '1', '13', '1234567', 'email@email.com', 'Nombre', 'Apellido', '601606', '0976921801', 'Direccion', 'Recoleta', '2018-05-02 00:00:00', '1969-12-31', '1');
INSERT INTO `paciente` VALUES ('2', '1', '13', '123456', 'raul.ramirez@imagenwebhq.com', 'Juan', 'Perez', '601606', '0976921801', 'Una Direccion', 'Un BARRIO', '2018-05-04 00:00:00', '2018-01-05', '1');
INSERT INTO `paciente` VALUES ('3', '1', '13', '654321', 'email@email.com', 'Jhon', 'Doe', '601606', '0976921801', 'Dos direcciones', 'Recoleta', '2018-05-04 00:00:00', '2018-09-05', '1');

-- ----------------------------
-- Table structure for tipo_documento
-- ----------------------------
DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE `tipo_documento` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) DEFAULT NULL,
  `estado` int(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_documento
-- ----------------------------
INSERT INTO `tipo_documento` VALUES ('1', 'Cedula de Identidad', '1');
INSERT INTO `tipo_documento` VALUES ('2', 'RUC', '1');
INSERT INTO `tipo_documento` VALUES ('3', 'Pasaporte', '1');

-- ----------------------------
-- Table structure for turno
-- ----------------------------
DROP TABLE IF EXISTS `turno`;
CREATE TABLE `turno` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) unsigned NOT NULL,
  `title` varchar(120) DEFAULT NULL,
  `descripcion` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_paciente_turno` (`id_paciente`),
  CONSTRAINT `fk_id_paciente_turno` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of turno
-- ----------------------------
INSERT INTO `turno` VALUES ('2', '1', 'Motivo', 'Observaciones', '2018-03-05 10:30:00', '2018-03-05 11:00:00');
INSERT INTO `turno` VALUES ('3', '1', 'Motivo', 'oo', '2018-04-05 09:30:00', '2018-04-05 10:00:00');
INSERT INTO `turno` VALUES ('4', '1', 'Motivo', 'oo', '2018-04-05 09:30:00', '2018-04-05 10:00:00');
INSERT INTO `turno` VALUES ('5', '1', 'Motivo', 'asasas', '2018-05-05 10:00:00', '2018-05-05 10:30:00');
INSERT INTO `turno` VALUES ('6', '1', 'asasa', 'asasasas', '2018-03-05 10:00:00', '2018-03-05 11:30:00');
INSERT INTO `turno` VALUES ('7', '1', 'aaa', 'aaaa', '2018-02-05 09:00:00', '2018-02-05 09:30:00');
INSERT INTO `turno` VALUES ('8', '1', 'sasa', 'asasa', '2018-02-05 08:30:00', '2018-02-05 09:00:00');
INSERT INTO `turno` VALUES ('10', '3', 'asasa', 'asasasas', '2018-05-03 10:00:00', '2018-05-03 10:30:00');
INSERT INTO `turno` VALUES ('11', '1', 'Masas', 'oooooo', '2018-05-03 17:00:00', '2018-05-03 17:30:00');

-- ----------------------------
-- Table structure for web_blog
-- ----------------------------
DROP TABLE IF EXISTS `web_blog`;
CREATE TABLE `web_blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(145) DEFAULT NULL,
  `contenido` longtext,
  `imagen` varchar(120) DEFAULT NULL,
  `imagen_thumb` varchar(145) DEFAULT NULL,
  `url_youtube` varchar(120) DEFAULT NULL,
  `fecha_blog` date DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_blog
-- ----------------------------
INSERT INTO `web_blog` VALUES ('1', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt ut mi vel convallis. Fusce condimentum neque sit amet quam condimentum, eget vulputate magna tempor. Vivamus pretium metus id orci facilisis interdum. Phasellus laoreet ultrices lorem vel blandit. Etiam iaculis pellentesque fringilla. Donec convallis aliquam dui, et posuere purus viverra ut. Nulla pharetra venenatis dui non maximus.</p>', 'blog1.jpg', 'blog1-thumb.jpg', '#', '2018-05-14', '2018-05-14 11:24:05', '1');
INSERT INTO `web_blog` VALUES ('2', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt ut mi vel convallis. Fusce condimentum neque sit amet quam condimentum, eget vulputate magna tempor. Vivamus pretium metus id orci facilisis interdum. Phasellus laoreet ultrices lorem vel blandit. Etiam iaculis pellentesque fringilla. Donec convallis aliquam dui, et posuere purus viverra ut. Nulla pharetra venenatis dui non maximus.</p>', 'blog2.jpg', 'blog2-thumb.jpg', '#', '2018-05-15', '2018-05-15 11:24:05', '1');
INSERT INTO `web_blog` VALUES ('3', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt ut mi vel convallis. Fusce condimentum neque sit amet quam condimentum, eget vulputate magna tempor. Vivamus pretium metus id orci facilisis interdum. Phasellus laoreet ultrices lorem vel blandit. Etiam iaculis pellentesque fringilla. Donec convallis aliquam dui, et posuere purus viverra ut. Nulla pharetra venenatis dui non maximus.</p>', 'blog3.jpg', 'blog3-thumb.jpg', '#', '2018-05-16', '2018-05-16 11:24:05', '1');
INSERT INTO `web_blog` VALUES ('4', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt ut mi vel convallis. Fusce condimentum neque sit amet quam condimentum, eget vulputate magna tempor. Vivamus pretium metus id orci facilisis interdum. Phasellus laoreet ultrices lorem vel blandit. Etiam iaculis pellentesque fringilla. Donec convallis aliquam dui, et posuere purus viverra ut. Nulla pharetra venenatis dui non maximus.</p>', 'blog4.jpg', 'blog4-thumb.jpg', '#', '2018-05-17', '2018-05-16 11:24:05', '1');

-- ----------------------------
-- Table structure for web_contacto
-- ----------------------------
DROP TABLE IF EXISTS `web_contacto`;
CREATE TABLE `web_contacto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `asunto` varchar(145) DEFAULT NULL,
  `mensaje` text,
  `fecha` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `leido` int(1) DEFAULT '0',
  `ip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_contacto
-- ----------------------------
INSERT INTO `web_contacto` VALUES ('1', 'Raul', 'raul.chuky@gmail.com', 'Prueba', 'Esto es una prueba del mensaje', '2018-05-20 12:22:33', '1', null);

-- ----------------------------
-- Table structure for web_datos
-- ----------------------------
DROP TABLE IF EXISTS `web_datos`;
CREATE TABLE `web_datos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `telefono` varchar(30) DEFAULT NULL,
  `telefono_2` varchar(30) DEFAULT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `logo_2` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_datos
-- ----------------------------
INSERT INTO `web_datos` VALUES ('1', '+595 981 258 733', '+595 985 866 818', 'Dr. Alejandro Dávalos No. 437', '-25.294814', '-57.595430', 'consulta@nathalyperdomo.com\r\n\r\n\r\n', 'logo.png', null, 'Nathaly Perdomo');

-- ----------------------------
-- Table structure for web_frases
-- ----------------------------
DROP TABLE IF EXISTS `web_frases`;
CREATE TABLE `web_frases` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `frase` text,
  `autor` varchar(60) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `orden` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_frases
-- ----------------------------
INSERT INTO `web_frases` VALUES ('1', 'Un hombre muy ocupado para cuidar de su salud es como un mecánico muy ocupado por cuidar sus herramientas.', 'Proverbio español', '1', '1');
INSERT INTO `web_frases` VALUES ('2', 'Hoy en día, más del 95% de las enfermedades crónicas están causadas por la comida, ingredientes tóxicos, deficiencias nutricionales y falta de ejercicio físico.', 'Mike Adams', '1', '2');
INSERT INTO `web_frases` VALUES ('3', 'No te recompenses con comidas poco saludables, recompénsate con actividades divertidas y saludables.', null, '1', '3');
INSERT INTO `web_frases` VALUES ('4', 'No conviertas tu estómago en una bolsa de basura.', null, '1', '4');
INSERT INTO `web_frases` VALUES ('5', 'frase larga', 'autor', '0', '5');
INSERT INTO `web_frases` VALUES ('6', 'frase 2 34 321', 'Autor 45 123', '0', '6');

-- ----------------------------
-- Table structure for web_header_images
-- ----------------------------
DROP TABLE IF EXISTS `web_header_images`;
CREATE TABLE `web_header_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seccion` enum('Nathaly','Blog','Consultorio','Contacto','Busqueda') DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_header_images
-- ----------------------------

-- ----------------------------
-- Table structure for web_inicio_caracteristicas
-- ----------------------------
DROP TABLE IF EXISTS `web_inicio_caracteristicas`;
CREATE TABLE `web_inicio_caracteristicas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) DEFAULT NULL,
  `contenido` text,
  `icon` varchar(60) DEFAULT NULL,
  `enlace` varchar(120) DEFAULT NULL,
  `orden` int(2) unsigned DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_inicio_caracteristicas
-- ----------------------------
INSERT INTO `web_inicio_caracteristicas` VALUES ('1', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt ut mi vel convallis. Fusce condimentum neque sit amet quam condimentum, eget vulputate magna tempor. Vivamus pretium metus id orci facilisis interdum. Phasellus laoreet ultrices lorem vel blandit. Etiam iaculis pellentesque fringilla. Donec convallis aliquam dui, et posuere purus viverra ut. Nulla pharetra venenatis dui non maximus.', 'medical-icon-i-alternative-complementary', '#', '1', '1');
INSERT INTO `web_inicio_caracteristicas` VALUES ('2', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt ut mi vel convallis. Fusce condimentum neque sit amet quam condimentum, eget vulputate magna tempor. Vivamus pretium metus id orci facilisis interdum. Phasellus laoreet ultrices lorem vel blandit. Etiam iaculis pellentesque fringilla. Donec convallis aliquam dui, et posuere purus viverra ut. Nulla pharetra venenatis dui non maximus.', 'medical-icon-i-cardiology', '#', '2', '1');
INSERT INTO `web_inicio_caracteristicas` VALUES ('3', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt ut mi vel convallis. Fusce condimentum neque sit amet quam condimentum, eget vulputate magna tempor. Vivamus pretium metus id orci facilisis interdum. Phasellus laoreet ultrices lorem vel blandit. Etiam iaculis pellentesque fringilla. Donec convallis aliquam dui, et posuere purus viverra ut. Nulla pharetra venenatis dui non maximus.', 'medical-icon-i-nutrition', '#', '3', '1');
INSERT INTO `web_inicio_caracteristicas` VALUES ('4', 'Titulo', 'Contenido', 'medical-icon-i-waiting-area', null, '4', '0');

-- ----------------------------
-- Table structure for web_inicio_nosotros
-- ----------------------------
DROP TABLE IF EXISTS `web_inicio_nosotros`;
CREATE TABLE `web_inicio_nosotros` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) DEFAULT NULL,
  `contenido` text,
  `imagen` varchar(120) DEFAULT NULL,
  `imagen_header` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_inicio_nosotros
-- ----------------------------
INSERT INTO `web_inicio_nosotros` VALUES ('1', 'UN MUNDO EN NUTRICION', '<p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo mullam.</p>', '576x454-index.png', 'aboutus-header.jpg');

-- ----------------------------
-- Table structure for web_inicio_parallax
-- ----------------------------
DROP TABLE IF EXISTS `web_inicio_parallax`;
CREATE TABLE `web_inicio_parallax` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `texto` varchar(80) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_inicio_parallax
-- ----------------------------
INSERT INTO `web_inicio_parallax` VALUES ('1', 'EMPIEZA HOY MISMO A CUIDARTE', 'index-image-section.jpg');

-- ----------------------------
-- Table structure for web_inicio_servicios
-- ----------------------------
DROP TABLE IF EXISTS `web_inicio_servicios`;
CREATE TABLE `web_inicio_servicios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `servicio` varchar(80) DEFAULT NULL,
  `contenido` text,
  `orden` int(2) unsigned DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_inicio_servicios
-- ----------------------------
INSERT INTO `web_inicio_servicios` VALUES ('1', 'Planes de Alimentación', 'Sed non neque elit. Sed ut imperdiet nisi. Proin condime ntum fermentum nunc. Etiam pharetra, erat sed ferm entum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.', '1', '1');
INSERT INTO `web_inicio_servicios` VALUES ('2', 'Trastornos de la alimentación', 'Sed non neque elit. Sed ut imperdiet nisi. Proin condime ntum fermentum nunc. Etiam pharetra, erat sed ferm entum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.', '2', '1');
INSERT INTO `web_inicio_servicios` VALUES ('3', 'Nutrición Clinica', 'Sed non neque elit. Sed ut imperdiet nisi. Proin condime ntum fermentum nunc. Etiam pharetra, erat sed ferm entum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.', '3', '1');
INSERT INTO `web_inicio_servicios` VALUES ('4', 'Control del peso', 'Sed non neque elit. Sed ut imperdiet nisi. Proin condime ntum fermentum nunc. Etiam pharetra, erat sed ferm entum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.', '4', '1');
INSERT INTO `web_inicio_servicios` VALUES ('5', 'Servicio', 'Prueba del servivio', '5', '0');

-- ----------------------------
-- Table structure for web_inicio_slider
-- ----------------------------
DROP TABLE IF EXISTS `web_inicio_slider`;
CREATE TABLE `web_inicio_slider` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `texto_1` varchar(60) DEFAULT NULL,
  `texto_2` varchar(60) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `principal` int(1) DEFAULT '0',
  `orden` int(2) unsigned DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_inicio_slider
-- ----------------------------
INSERT INTO `web_inicio_slider` VALUES ('1', 'Comé lo que te gusta', 'en la medida justa', '310x649_inicio_1.png', '1', null, '1');
INSERT INTO `web_inicio_slider` VALUES ('2', 'La salud es una relación', 'entre tú y tu cuerpo', 'img1.jpg', '0', '1', '1');
INSERT INTO `web_inicio_slider` VALUES ('3', 'Texto 1', 'Texto 2', '3_KICKS-AUTOLOGIA-1.jpg', '0', '2', '1');

-- ----------------------------
-- Table structure for web_inicio_video
-- ----------------------------
DROP TABLE IF EXISTS `web_inicio_video`;
CREATE TABLE `web_inicio_video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) DEFAULT NULL,
  `texto_info` varchar(80) DEFAULT NULL,
  `url_video` varchar(120) DEFAULT NULL,
  `texto_info2` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_inicio_video
-- ----------------------------
INSERT INTO `web_inicio_video` VALUES ('1', 'DESDE LA COMODIDAD DE TU CASA', 'o desde la clinica', '#', 'Tu eliges');

-- ----------------------------
-- Table structure for web_medical_icon
-- ----------------------------
DROP TABLE IF EXISTS `web_medical_icon`;
CREATE TABLE `web_medical_icon` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_medical_icon
-- ----------------------------
INSERT INTO `web_medical_icon` VALUES ('1', 'medical-icon-i-womens-health', '1');
INSERT INTO `web_medical_icon` VALUES ('2', 'medical-icon-i-waiting-area', '1');
INSERT INTO `web_medical_icon` VALUES ('3', 'medical-icon-i-volume-control', '1');
INSERT INTO `web_medical_icon` VALUES ('4', 'medical-icon-i-ultrasound', '1');
INSERT INTO `web_medical_icon` VALUES ('5', 'medical-icon-i-text-telephone', '1');
INSERT INTO `web_medical_icon` VALUES ('6', 'medical-icon-i-surgery', '1');
INSERT INTO `web_medical_icon` VALUES ('7', 'medical-icon-i-stairs', '1');
INSERT INTO `web_medical_icon` VALUES ('8', 'medical-icon-i-radiology', '1');
INSERT INTO `web_medical_icon` VALUES ('9', 'medical-icon-i-physical-therapy', '1');
INSERT INTO `web_medical_icon` VALUES ('10', 'medical-icon-i-pharmacy', '1');
INSERT INTO `web_medical_icon` VALUES ('11', 'medical-icon-i-pediatrics', '1');
INSERT INTO `web_medical_icon` VALUES ('12', 'medical-icon-i-pathology', '1');
INSERT INTO `web_medical_icon` VALUES ('13', 'medical-icon-i-outpatient', '1');
INSERT INTO `web_medical_icon` VALUES ('14', 'medical-icon-i-mental-health', '1');
INSERT INTO `web_medical_icon` VALUES ('15', 'medical-icon-i-medical-records', '1');
INSERT INTO `web_medical_icon` VALUES ('16', 'medical-icon-i-medical-library', '1');
INSERT INTO `web_medical_icon` VALUES ('17', 'medical-icon-i-mammography', '1');
INSERT INTO `web_medical_icon` VALUES ('18', 'medical-icon-i-laboratory', '1');
INSERT INTO `web_medical_icon` VALUES ('19', 'medical-icon-i-labor-delivery', '1');
INSERT INTO `web_medical_icon` VALUES ('20', 'medical-icon-i-immunizations', '1');
INSERT INTO `web_medical_icon` VALUES ('21', 'medical-icon-i-imaging-root-category', '1');
INSERT INTO `web_medical_icon` VALUES ('22', 'medical-icon-i-imaging-alternative-pet', '1');
INSERT INTO `web_medical_icon` VALUES ('23', 'medical-icon-i-imaging-alternative-mri', '1');
INSERT INTO `web_medical_icon` VALUES ('24', 'medical-icon-i-imaging-alternative-mri-two', '1');
INSERT INTO `web_medical_icon` VALUES ('25', 'medical-icon-i-imaging-alternative-ct', '1');
INSERT INTO `web_medical_icon` VALUES ('26', 'medical-icon-i-fire-extinguisher', '1');
INSERT INTO `web_medical_icon` VALUES ('27', 'medical-icon-i-family-practice', '1');
INSERT INTO `web_medical_icon` VALUES ('28', 'medical-icon-i-emergency', '1');
INSERT INTO `web_medical_icon` VALUES ('29', 'medical-icon-i-elevators', '1');
INSERT INTO `web_medical_icon` VALUES ('30', 'medical-icon-i-ear-nose-throat', '1');
INSERT INTO `web_medical_icon` VALUES ('31', 'medical-icon-i-drinking-fountain', '1');
INSERT INTO `web_medical_icon` VALUES ('32', 'medical-icon-i-cardiology', '1');
INSERT INTO `web_medical_icon` VALUES ('33', 'medical-icon-i-billing', '1');
INSERT INTO `web_medical_icon` VALUES ('34', 'medical-icon-i-anesthesia', '1');
INSERT INTO `web_medical_icon` VALUES ('35', 'medical-icon-i-ambulance', '1');
INSERT INTO `web_medical_icon` VALUES ('36', 'medical-icon-i-alternative-complementary', '1');
INSERT INTO `web_medical_icon` VALUES ('37', 'medical-icon-i-administration', '1');
INSERT INTO `web_medical_icon` VALUES ('38', 'medical-icon-i-social-services', '1');
INSERT INTO `web_medical_icon` VALUES ('39', 'medical-icon-i-smoking', '1');
INSERT INTO `web_medical_icon` VALUES ('40', 'medical-icon-i-restrooms', '1');
INSERT INTO `web_medical_icon` VALUES ('41', 'medical-icon-i-restaurant', '1');
INSERT INTO `web_medical_icon` VALUES ('42', 'medical-icon-i-respiratory', '1');
INSERT INTO `web_medical_icon` VALUES ('43', 'medical-icon-i-registration', '1');
INSERT INTO `web_medical_icon` VALUES ('44', 'medical-icon-i-oncology', '1');
INSERT INTO `web_medical_icon` VALUES ('45', 'medical-icon-i-nutrition', '1');
INSERT INTO `web_medical_icon` VALUES ('46', 'medical-icon-i-nursery', '1');
INSERT INTO `web_medical_icon` VALUES ('47', 'medical-icon-i-no-smoking', '1');
INSERT INTO `web_medical_icon` VALUES ('48', 'medical-icon-i-neurology', '1');
INSERT INTO `web_medical_icon` VALUES ('49', 'medical-icon-i-mri-pet', '1');
INSERT INTO `web_medical_icon` VALUES ('50', 'medical-icon-i-interpreter-services', '1');
INSERT INTO `web_medical_icon` VALUES ('51', 'medical-icon-i-internal-medicine', '1');
INSERT INTO `web_medical_icon` VALUES ('52', 'medical-icon-i-intensive-care', '1');
INSERT INTO `web_medical_icon` VALUES ('53', 'medical-icon-i-inpatient', '1');
INSERT INTO `web_medical_icon` VALUES ('54', 'medical-icon-i-information-us', '1');
INSERT INTO `web_medical_icon` VALUES ('55', 'medical-icon-i-infectious-diseases', '1');
INSERT INTO `web_medical_icon` VALUES ('56', 'medical-icon-i-hearing-assistance', '1');
INSERT INTO `web_medical_icon` VALUES ('57', 'medical-icon-i-health-services', '1');
INSERT INTO `web_medical_icon` VALUES ('58', 'medical-icon-i-health-education', '1');
INSERT INTO `web_medical_icon` VALUES ('59', 'medical-icon-i-gift-shop', '1');
INSERT INTO `web_medical_icon` VALUES ('60', 'medical-icon-i-genetics', '1');
INSERT INTO `web_medical_icon` VALUES ('61', 'medical-icon-i-first-aid', '1');
INSERT INTO `web_medical_icon` VALUES ('62', 'medical-icon-i-dermatology', '1');

-- ----------------------------
-- Table structure for web_nosotros
-- ----------------------------
DROP TABLE IF EXISTS `web_nosotros`;
CREATE TABLE `web_nosotros` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `imagen_header` varchar(120) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `texto` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_nosotros
-- ----------------------------
INSERT INTO `web_nosotros` VALUES ('1', 'aboutus-header.jpg', null, null);

-- ----------------------------
-- Table structure for web_page_nosotros
-- ----------------------------
DROP TABLE IF EXISTS `web_page_nosotros`;
CREATE TABLE `web_page_nosotros` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `imagen_header` varchar(120) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `texto` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_page_nosotros
-- ----------------------------
INSERT INTO `web_page_nosotros` VALUES ('1', 'aboutus-header.jpg', 'aboutus.png', '                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt ut mi vel convallis. Fusce condimentum neque sit amet quam condimentum, eget vulputate magna tempor. Vivamus pretium metus id orci facilisis interdum. Phasellus laoreet ultrices lorem vel blandit. Etiam iaculis pellentesque fringilla. Donec convallis aliquam dui, et posuere purus viverra ut. Nulla pharetra venenatis dui non maximus.</p>\r\n\r\n<p>Sed id condimentum mauris, quis lacinia lacus. Pellentesque sit amet risus in risus pharetra pulvinar. Vestibulum vulputate posuere quam, eget consequat tortor mattis a. Sed sagittis efficitur pellentesque. Fusce sed placerat nunc. Duis pulvinar in felis non ultrices. Sed rutrum dolor at ligula dictum eleifend. Duis fringilla quam diam, eget tempor ante egestas ac. Nulla congue nunc pharetra mauris dapibus scelerisque. Nam elementum metus orci, vel placerat nisi feugiat non. Donec laoreet molestie pharetra. Vivamus vitae dictum purus, quis fermentum libero. Nunc luctus nibh dui, at malesuada purus fringilla non. Proin facilisis augue quis risus faucibus, volutpat ultricies sem auctor.</p>                            ');

-- ----------------------------
-- Table structure for web_redes
-- ----------------------------
DROP TABLE IF EXISTS `web_redes`;
CREATE TABLE `web_redes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) DEFAULT NULL,
  `enlace` varchar(145) DEFAULT NULL,
  `estado` int(1) unsigned DEFAULT '1',
  `orden` int(2) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `class_i` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_redes
-- ----------------------------
INSERT INTO `web_redes` VALUES ('1', 'Facebook', '#', '1', '1', 'facebook', 'icon-facebook');
INSERT INTO `web_redes` VALUES ('2', 'Google+', '#', '1', '2', 'googleplus', 'icon-gplus');
INSERT INTO `web_redes` VALUES ('3', 'Twitter', '#', '1', '3', 'twitter', 'icon-twitter');
INSERT INTO `web_redes` VALUES ('4', 'Vimeo', '#', '1', '4', 'vimeo', 'icon-vimeo');
INSERT INTO `web_redes` VALUES ('5', 'Youtube', '#', '1', '5', 'youtube', 'icon-play');
INSERT INTO `web_redes` VALUES ('6', 'Flickr', '#', '1', '6', 'flickr', 'icon-flickr');
INSERT INTO `web_redes` VALUES ('7', 'Linkedin', '#', '1', '7', 'linked_in', 'icon-linkedin');
INSERT INTO `web_redes` VALUES ('8', 'Pinterest', '#', '1', '8', 'pinterest', 'icon-pinterest');
INSERT INTO `web_redes` VALUES ('9', 'Dribble', '#', '1', '9', 'dribbble', 'icon-dribbble');
SET FOREIGN_KEY_CHECKS=1;

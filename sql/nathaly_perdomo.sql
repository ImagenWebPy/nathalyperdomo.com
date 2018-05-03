/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : nathaly_perdomo

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-05-02 23:39:47
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of paciente
-- ----------------------------
INSERT INTO `paciente` VALUES ('1', '1', '13', '1234567', 'email@email.com', 'Nombre', 'Apellido', '601606', '0976921801', 'Direccion', 'Recoleta', '2018-05-02 00:00:00', '1969-12-31', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
INSERT INTO `turno` VALUES ('9', '1', 'sdasd', 'sadasdsa', '2018-05-02 10:30:00', '2018-05-02 11:30:00');
SET FOREIGN_KEY_CHECKS=1;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2017 at 04:11 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

-- Crear una tabla para preguntas frecuentes sobre veterinaria
CREATE TABLE `preguntas_frecuentes` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `pregunta` TEXT NOT NULL,
  `respuesta` TEXT NOT NULL
);

INSERT INTO `preguntas_frecuentes` (`pregunta`, `respuesta`) VALUES
('¿Cómo elegir el alimento adecuado para mi perro o gato?', 'Consulta con tu veterinario para seleccionar un alimento que se adapte a las necesidades específicas de tu mascota.'),
('¿Qué hacer si mi perro se traga un objeto extraño?', 'Lleva a tu perro al veterinario de inmediato para evitar posibles obstrucciones intestinales.'),
('¿Puedo darle chocolate a mi perro o gato?', 'No, el chocolate es tóxico para las mascotas y debe evitarse por completo.'),
('¿Cuándo debo desparasitar a mi mascota?', 'Sigue el programa de desparasitación recomendado por tu veterinario, generalmente cada 3-6 meses.'),
('¿Cómo prevenir la obesidad en perros y gatos?', 'Controla la cantidad de comida, proporciona ejercicio y evita darles alimentos humanos.'),
('¿Es necesario esterilizar o castrar a mi mascota?', 'La esterilización/castración es importante para el control de la población y la salud de tu mascota. Consulta a tu veterinario.'),
('¿Cómo detectar signos de enfermedad en mi mascota?', 'Mantén un ojo en cambios en el apetito, comportamiento, actividad y síntomas como vómitos o diarrea.'),
('¿Cuál es la mejor forma de entrenar a un cachorro?', 'Usa refuerzo positivo, paciencia y socialización temprana para criar a un perro bien educado.'),
('¿Cuándo se considera que un gato es senior?', 'La mayoría de los gatos se consideran seniors a partir de los 7-10 años. Consulta a tu veterinario para un cuidado adecuado.'),
('¿Puedo darle a mi perro huesos de juguete?', 'Sí, los huesos de juguete diseñados específicamente para perros son seguros y pueden ser beneficiosos para la salud dental.'),
('¿Cómo evitar que mi gato arañe muebles?', 'Proporciona rascadores adecuados y usa repelentes naturales para redirigir su comportamiento.'),
('¿Qué hacer si mi mascota tiene alergias?', 'Consulta a un veterinario para identificar y tratar las alergias de tu mascota.'),
('¿Cuáles son los beneficios de la socialización de cachorros?', 'La socialización temprana ayuda a los cachorros a adaptarse a diferentes situaciones y personas, reduciendo la agresividad y el miedo.'),
('¿Cómo elegir el mejor juguete para mi perro?', 'Considera el tamaño, la edad y el tipo de juego preferido de tu perro al seleccionar juguetes.'),
('¿Cómo mantener los dientes de mi gato limpios?', 'Utiliza cepillos de dientes específicos para gatos o trata de darles alimentos secos que promuevan la salud dental.'),
('¿Es seguro darle lechuga a mi conejo?', 'Sí, la lechuga es segura para los conejos en moderación, pero evita tipos de lechuga con alto contenido de calcio.'),
('¿Cuál es la importancia de la atención veterinaria preventiva?', 'Las revisiones regulares ayudan a detectar problemas de salud temprano y mantener a tu mascota en óptimas condiciones.'),
('¿Qué hacer si mi gato tiene bolas de pelo?', 'Ofrece comida para gatos específica para la eliminación de bolas de pelo y cepilla a tu gato regularmente.'),
('¿Puedo darle pescado a mi perro o gato?', 'El pescado cocido sin huesos y sin especias puede ser una fuente de proteínas, pero con moderación.'),
('¿Cuándo se considera que un perro es senior?', 'Depende de la raza y el tamaño, pero generalmente a partir de los 7-10 años se considera un perro senior.'),
('¿Cómo entrenar a un perro para hacer sus necesidades afuera?', 'Usa el refuerzo positivo, lleva a tu perro a menudo y sigue una rutina de horarios.'),
('¿Qué cuidados necesita una cobaya como mascota?', 'Proporciona heno, verduras frescas y una jaula espaciosa para una cobaya feliz y saludable.'),
('¿Puedo darle nueces a mi perro?', 'La mayoría de las nueces no son seguras para los perros debido a su alto contenido de grasa. Evita darles nueces.'),
('¿Cómo ayudar a una mascota con miedo a los truenos?', 'Crea un lugar seguro, utiliza música suave y considera productos calmantes recomendados por un veterinario.'),
('¿Cómo elijo la comidita ideal pa mi perrito o gatito?', 'Habla con tu vet pa escoger un pienso que le caiga bien a tu mascota.'),
('¿Qué onda si mi chucho se traga algo raro?', 'Llévalo corriendo al veterinario pa evitar que se le atasque en la pancita.'),
('¿Puedo darle chocolate a mi bichito?', 'Ni se te ocurra, el chocolate les hace daño a los peluditos.'),
('¿Cuándo desparasito a mi peludo?', 'Sigue el plan de desparasitación que te recomiende el vet, por lo general cada 3-6 meses.'),
('¿Cómo evito que mi gato o perro se ponga gordito?', 'Cuida las porciones, que hagan ejercicio, y no les des comida de la mesa.'),
('¿Es necesario esterilizar a mi mascota?', 'Es importante para evitar que tengan crías y pa su salud, pregúntale al vet.'),
('¿Cómo me doy cuenta si mi mascota está enfermita?', 'Mantente atento a cambios en su apetito, ánimo, y a síntomas como vómito o diarrea.'),
('¿Cómo enseño a mi cachorrito a hacer pipí afuera?', 'Con premios y paciencia, llévalo seguido al patio y establece una rutina.'),
('¿A qué edad un gato se hace el abuelito?', 'Mayormente a los 7-10 años, pero pregúntale al vet para cuidados adecuados.'),
('¿Le puedo dar huesitos a mi perrito o gatito?', 'Sí, siempre y cuando sean juguetitos pa mascotas, les ayudan con los dientes'),
('Cómo elegir el alimento adecuado para mi perro o gato?', 'Consulta con tu veterinario para seleccionar un alimento que se adapte a las necesidades específicas de tu mascota.'),
('Qué hacer si mi perro se traga un objeto extraño?', 'Lleva a tu perro al veterinario de inmediato para evitar posibles obstrucciones intestinales.'),
('Puedo darle chocolate a mi perro o gato?', 'No, el chocolate es tóxico para las mascotas y debe evitarse por completo.'),
('Cuándo debo desparasitar a mi mascota?', 'Sigue el programa de desparasitación recomendado por tu veterinario, generalmente cada 3-6 meses.'),
('Cómo prevenir la obesidad en perros y gatos?', 'Controla la cantidad de comida, proporciona ejercicio y evita darles alimentos humanos.'),
('Es necesario esterilizar o castrar a mi mascota?', 'La esterilización/castración es importante para el control de la población y la salud de tu mascota. Consulta a tu veterinario.'),
('Cómo detectar signos de enfermedad en mi mascota?', 'Mantén un ojo en cambios en el apetito, comportamiento, actividad y síntomas como vómitos o diarrea.'),
('Cuál es la mejor forma de entrenar a un cachorro?', 'Usa refuerzo positivo, paciencia y socialización temprana para criar a un perro bien educado.'),
('Cuándo se considera que un gato es senior?', 'La mayoría de los gatos se consideran seniors a partir de los 7-10 años. Consulta a tu veterinario para un cuidado adecuado.'),
('Puedo darle a mi perro huesos de juguete?', 'Sí, los huesos de juguete diseñados específicamente para perros son seguros y pueden ser beneficiosos para la salud dental.'),
('Cómo evitar que mi gato arañe muebles?', 'Proporciona rascadores adecuados y usa repelentes naturales para redirigir su comportamiento.'),
('Qué hacer si mi mascota tiene alergias?', 'Consulta a un veterinario para identificar y tratar las alergias de tu mascota.'),
('Cuáles son los beneficios de la socialización de cachorros?', 'La socialización temprana ayuda a los cachorros a adaptarse a diferentes situaciones y personas, reduciendo la agresividad y el miedo.'),
('Cómo elegir el mejor juguete para mi perro?', 'Considera el tamaño, la edad y el tipo de juego preferido de tu perro al seleccionar juguetes.'),
('Cómo mantener los dientes de mi gato limpios?', 'Utiliza cepillos de dientes específicos para gatos o trata de darles alimentos secos que promuevan la salud dental.'),
('Es seguro darle lechuga a mi conejo?', 'Sí, la lechuga es segura para los conejos en moderación, pero evita tipos de lechuga con alto contenido de calcio.'),
('Cuál es la importancia de la atención veterinaria preventiva?', 'Las revisiones regulares ayudan a detectar problemas de salud temprano y mantener a tu mascota en óptimas condiciones.'),
('Qué hacer si mi gato tiene bolas de pelo?', 'Ofrece comida para gatos específica para la eliminación de bolas de pelo y cepilla a tu gato regularmente.'),
('Puedo darle pescado a mi perro o gato?', 'El pescado cocido sin huesos y sin especias puede ser una fuente de proteínas, pero con moderación.'),
('Cuándo se considera que un perro es senior?', 'Depende de la raza y el tamaño, pero generalmente a partir de los 7-10 años se considera un perro senior.'),
('Cómo entrenar a un perro para hacer sus necesidades afuera?', 'Usa el refuerzo positivo, lleva a tu perro a menudo y sigue una rutina de horarios.'),
('Qué cuidados necesita una cobaya como mascota?', 'Proporciona heno, verduras frescas y una jaula espaciosa para una cobaya feliz y saludable.'),
('Puedo darle nueces a mi perro?', 'La mayoría de las nueces no son seguras para los perros debido a su alto contenido de grasa. Evita darles nueces.'),
('Cómo ayudar a una mascota con miedo a los truenos?', 'Crea un lugar seguro, utiliza música suave y considera productos calmantes recomendados por un veterinario.'),
('Cómo elijo la comidita ideal pa mi perrito o gatito?', 'Habla con tu vet pa escoger un pienso que le caiga bien a tu mascota.'),
('Qué onda si mi chucho se traga algo raro?', 'Llévalo corriendo al veterinario pa evitar que se le atasque en la pancita.'),
('Puedo darle chocolate a mi bichito?', 'Ni se te ocurra, el chocolate les hace daño a los peluditos.'),
('Cuándo desparasito a mi peludo?', 'Sigue el plan de desparasitación que te recomiende el vet, por lo general cada 3-6 meses.'),
('Cómo evito que mi gato o perro se ponga gordito?', 'Cuida las porciones, que hagan ejercicio, y no les des comida de la mesa.'),
('Es necesario esterilizar a mi mascota?', 'Es importante para evitar que tengan crías y pa su salud, pregúntale al vet.'),
('Cómo me doy cuenta si mi mascota está enfermita?', 'Mantente atento a cambios en su apetito, ánimo, y a síntomas como vómito o diarrea.'),
('Cómo enseño a mi cachorrito a hacer pipí afuera?', 'Con premios y paciencia, llévalo seguido al patio y establece una rutina.'),
('A qué edad un gato se hace el abuelito?', 'Mayormente a los 7-10 años, pero pregúntale al vet para cuidados adecuados.'),
('Le puedo dar huesitos a mi perrito o gatito?', 'Sí, siempre y cuando sean juguetitos pa mascotas, les ayudan con los dientes')


('Cómo elegir el alimento adecuado para mi perro o gato', 'Consulta con tu veterinario para seleccionar un alimento que se adapte a las necesidades específicas de tu mascota.'),
('Qué hacer si mi perro se traga un objeto extraño', 'Lleva a tu perro al veterinario de inmediato para evitar posibles obstrucciones intestinales.'),
('Puedo darle chocolate a mi perro o gato', 'No, el chocolate es tóxico para las mascotas y debe evitarse por completo.'),
('Cuándo debo desparasitar a mi mascota', 'Sigue el programa de desparasitación recomendado por tu veterinario, generalmente cada 3-6 meses.'),
('Cómo prevenir la obesidad en perros y gatos', 'Controla la cantidad de comida, proporciona ejercicio y evita darles alimentos humanos.'),
('Es necesario esterilizar o castrar a mi mascota', 'La esterilización/castración es importante para el control de la población y la salud de tu mascota. Consulta a tu veterinario.'),
('Cómo detectar signos de enfermedad en mi mascota', 'Mantén un ojo en cambios en el apetito, comportamiento, actividad y síntomas como vómitos o diarrea.'),
('Cuál es la mejor forma de entrenar a un cachorro', 'Usa refuerzo positivo, paciencia y socialización temprana para criar a un perro bien educado.'),
('Cuándo se considera que un gato es senior', 'La mayoría de los gatos se consideran seniors a partir de los 7-10 años. Consulta a tu veterinario para un cuidado adecuado.'),
('Puedo darle a mi perro huesos de juguete', 'Sí, los huesos de juguete diseñados específicamente para perros son seguros y pueden ser beneficiosos para la salud dental.'),
('Cómo evitar que mi gato arañe muebles', 'Proporciona rascadores adecuados y usa repelentes naturales para redirigir su comportamiento.'),
('Qué hacer si mi mascota tiene alergias', 'Consulta a un veterinario para identificar y tratar las alergias de tu mascota.'),
('Cuáles son los beneficios de la socialización de cachorros', 'La socialización temprana ayuda a los cachorros a adaptarse a diferentes situaciones y personas, reduciendo la agresividad y el miedo.'),
('Cómo elegir el mejor juguete para mi perro', 'Considera el tamaño, la edad y el tipo de juego preferido de tu perro al seleccionar juguetes.'),
('Cómo mantener los dientes de mi gato limpios', 'Utiliza cepillos de dientes específicos para gatos o trata de darles alimentos secos que promuevan la salud dental.'),
('Es seguro darle lechuga a mi conejo', 'Sí, la lechuga es segura para los conejos en moderación, pero evita tipos de lechuga con alto contenido de calcio.'),
('Cuál es la importancia de la atención veterinaria preventiva', 'Las revisiones regulares ayudan a detectar problemas de salud temprano y mantener a tu mascota en óptimas condiciones.'),
('Qué hacer si mi gato tiene bolas de pelo', 'Ofrece comida para gatos específica para la eliminación de bolas de pelo y cepilla a tu gato regularmente.'),
('Puedo darle pescado a mi perro o gato', 'El pescado cocido sin huesos y sin especias puede ser una fuente de proteínas, pero con moderación.'),
('Cuándo se considera que un perro es senior', 'Depende de la raza y el tamaño, pero generalmente a partir de los 7-10 años se considera un perro senior.'),
('Cómo entrenar a un perro para hacer sus necesidades afuera', 'Usa el refuerzo positivo, lleva a tu perro a menudo y sigue una rutina de horarios.'),
('Qué cuidados necesita una cobaya como mascota', 'Proporciona heno, verduras frescas y una jaula espaciosa para una cobaya feliz y saludable.'),
('Puedo darle nueces a mi perro', 'La mayoría de las nueces no son seguras para los perros debido a su alto contenido de grasa. Evita darles nueces.'),
('Cómo ayudar a una mascota con miedo a los truenos', 'Crea un lugar seguro, utiliza música suave y considera productos calmantes recomendados por un veterinario.'),
('Cómo elijo la comidita ideal pa mi perrito o gatito', 'Habla con tu vet pa escoger un pienso que le caiga bien a tu mascota.'),
('Qué onda si mi chucho se traga algo raro', 'Llévalo corriendo al veterinario pa evitar que se le atasque en la pancita.'),
('Puedo darle chocolate a mi bichito', 'Ni se te ocurra, el chocolate les hace daño a los peluditos.'),
('Cuándo desparasito a mi peludo', 'Sigue el plan de desparasitación que te recomiende el vet, por lo general cada 3-6 meses.'),
('Cómo evito que mi gato o perro se ponga gordito', 'Cuida las porciones, que hagan ejercicio, y no les des comida de la mesa.'),
('Es necesario esterilizar a mi mascota', 'Es importante para evitar que tengan crías y pa su salud, pregúntale al vet.'),
('Cómo me doy cuenta si mi mascota está enfermita', 'Mantente atento a cambios en su apetito, ánimo, y a síntomas como vómito o diarrea.'),
('Cómo enseño a mi cachorrito a hacer pipí afuera', 'Con premios y paciencia, llévalo seguido al patio y establece una rutina.'),
('A qué edad un gato se hace el abuelito', 'Mayormente a los 7-10 años, pero pregúntale al vet para cuidados adecuados.'),
('Le puedo dar huesitos a mi perrito o gatito', 'Sí, siempre y cuando sean juguetitos pa mascotas, les ayudan con los dientes')





--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `preguntas_frecuentes`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

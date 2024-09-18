CREATE DATABASE tienda_tandil;
USE tienda_tandil;

CREATE TABLE Categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE Producto (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    descripcion TEXT,
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES Categoria(id_categoria)
);

-- datos de ejemplo
INSERT INTO Categoria (nombre) VALUES ('Teclados'), ('Microprocesadores'), ('Tarjetas Graficas'), ('Ratones');

INSERT INTO Producto (nombre, precio, descripcion, id_categoria) VALUES 
('EPOMAKER RT100', 219999.00, 'Teclado Mecánico estilo retro con Pantalla Inteligente Personalizable, Interruptores Volátiles en Calor, BT5.0/2.4G Inalámbrico, Batería de 5000mAh.', 1),
('TECLADO GAMER EVGA Z15 RGB COLOR CLICKY BRONZE',  103949.00, 'Este teclado Evga de alto rendimiento permite que puedas disfrutar de horas ilimitadas de juegos. Está diseñado especialmente para que puedas expresar tanto tus habilidades como tu estilo.', 1),
('AMD Ryzen 7 5800X', 179527.50, 'Procesador de escritorio desbloqueado de 8 núcleos y 16 hilos 4.7 GHz Max Boost, desbloqueado para overclocking, 36 MB de caché, soporte DDR-3200. Para la plataforma avanzada Socket AM4, puede admitir PCIe 4.0 en placas base X570 y B550', 2),
('Intel Core i7-12700KF', 188999.62, 'Procesador de escritorio para juegos 12 (8P+4E) núcleos hasta 5.0 GHz desbloqueado LGA1700 Serie 600 Chipset 125W', 2),
('MSI Gaming RTX 4080 Super 16gb', 188999.62, 'Tarjeta gráfica NVIDIA RTX 4080 Super, 256 bits, reloj de aumento: 2625 MHz, 16 GB GDRR6X 23 Gbps, HDMI/DP, Arquitectura Ada Lovelace', 3),
('Logitech G 502 Lightspeed',  79499.99, 'Mouse inalámbrico para juegos con sensor Hero 25K, compatible con PowerPlay, pesos sintonizables y Lightsync RGB - Negro', 4);




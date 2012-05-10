<ul>
    <li>
        Basico:
        <ol>
            <li>
                Catalogo de Productos 5
            </li>
        </ol>
    </li>
    <li>
        <a href="<?php echo url_for('home/intermedio') ?>">Intermedio</a>:
        <ol>
            <li>
                Catalogo de Productos 10
            </li>
			<li>
				Precio: 100.00 MXN
			</li>
			<li>
				<?php include_partial('boton_intermedio') ?>
			</li>
        </ol>
    </li>
    <li>
        <a href="<?php echo url_for('home/avanzado') ?>">Avanzado</a>:
        <ol>
            <li>
                Catalogo de Productos 15
            </li>
			<li>
				Precio: 200.00 MXN
			</li>
			<li>
				<?php include_partial('boton_avanzado') ?>
			</li>
        </ol>
    </li>
</ul>

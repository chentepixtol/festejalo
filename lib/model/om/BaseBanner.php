<?php

/**
 * Base class that represents a row from the 'banner' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue Nov 10 21:52:53 2009
 *
 * @package    lib.model.om
 */
abstract class BaseBanner extends BaseObject  implements Persistent {


  const PEER = 'BannerPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        BannerPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the empresa_id field.
	 * @var        int
	 */
	protected $empresa_id;

	/**
	 * The value for the titulo field.
	 * @var        string
	 */
	protected $titulo;

	/**
	 * The value for the texto field.
	 * @var        string
	 */
	protected $texto;

	/**
	 * The value for the slot field.
	 * @var        string
	 */
	protected $slot;

	/**
	 * The value for the imagen field.
	 * @var        string
	 */
	protected $imagen;

	/**
	 * The value for the tipo field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $tipo;

	/**
	 * The value for the segmento_id field.
	 * @var        int
	 */
	protected $segmento_id;

	/**
	 * The value for the categoria_id field.
	 * @var        int
	 */
	protected $categoria_id;

	/**
	 * @var        Empresa
	 */
	protected $aEmpresa;

	/**
	 * @var        Segmento
	 */
	protected $aSegmento;

	/**
	 * @var        Categoria
	 */
	protected $aCategoria;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Initializes internal state of BaseBanner object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->tipo = 1;
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [empresa_id] column value.
	 * 
	 * @return     int
	 */
	public function getEmpresaId()
	{
		return $this->empresa_id;
	}

	/**
	 * Get the [titulo] column value.
	 * 
	 * @return     string
	 */
	public function getTitulo()
	{
		return $this->titulo;
	}

	/**
	 * Get the [texto] column value.
	 * 
	 * @return     string
	 */
	public function getTexto()
	{
		return $this->texto;
	}

	/**
	 * Get the [slot] column value.
	 * 
	 * @return     string
	 */
	public function getSlot()
	{
		return $this->slot;
	}

	/**
	 * Get the [imagen] column value.
	 * 
	 * @return     string
	 */
	public function getImagen()
	{
		return $this->imagen;
	}

	/**
	 * Get the [tipo] column value.
	 * 
	 * @return     int
	 */
	public function getTipo()
	{
		return $this->tipo;
	}

	/**
	 * Get the [segmento_id] column value.
	 * 
	 * @return     int
	 */
	public function getSegmentoId()
	{
		return $this->segmento_id;
	}

	/**
	 * Get the [categoria_id] column value.
	 * 
	 * @return     int
	 */
	public function getCategoriaId()
	{
		return $this->categoria_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Banner The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BannerPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [empresa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Banner The current object (for fluent API support)
	 */
	public function setEmpresaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->empresa_id !== $v) {
			$this->empresa_id = $v;
			$this->modifiedColumns[] = BannerPeer::EMPRESA_ID;
		}

		if ($this->aEmpresa !== null && $this->aEmpresa->getId() !== $v) {
			$this->aEmpresa = null;
		}

		return $this;
	} // setEmpresaId()

	/**
	 * Set the value of [titulo] column.
	 * 
	 * @param      string $v new value
	 * @return     Banner The current object (for fluent API support)
	 */
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = BannerPeer::TITULO;
		}

		return $this;
	} // setTitulo()

	/**
	 * Set the value of [texto] column.
	 * 
	 * @param      string $v new value
	 * @return     Banner The current object (for fluent API support)
	 */
	public function setTexto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->texto !== $v) {
			$this->texto = $v;
			$this->modifiedColumns[] = BannerPeer::TEXTO;
		}

		return $this;
	} // setTexto()

	/**
	 * Set the value of [slot] column.
	 * 
	 * @param      string $v new value
	 * @return     Banner The current object (for fluent API support)
	 */
	public function setSlot($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slot !== $v) {
			$this->slot = $v;
			$this->modifiedColumns[] = BannerPeer::SLOT;
		}

		return $this;
	} // setSlot()

	/**
	 * Set the value of [imagen] column.
	 * 
	 * @param      string $v new value
	 * @return     Banner The current object (for fluent API support)
	 */
	public function setImagen($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->imagen !== $v) {
			$this->imagen = $v;
			$this->modifiedColumns[] = BannerPeer::IMAGEN;
		}

		return $this;
	} // setImagen()

	/**
	 * Set the value of [tipo] column.
	 * 
	 * @param      int $v new value
	 * @return     Banner The current object (for fluent API support)
	 */
	public function setTipo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tipo !== $v || $v === 1) {
			$this->tipo = $v;
			$this->modifiedColumns[] = BannerPeer::TIPO;
		}

		return $this;
	} // setTipo()

	/**
	 * Set the value of [segmento_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Banner The current object (for fluent API support)
	 */
	public function setSegmentoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->segmento_id !== $v) {
			$this->segmento_id = $v;
			$this->modifiedColumns[] = BannerPeer::SEGMENTO_ID;
		}

		if ($this->aSegmento !== null && $this->aSegmento->getId() !== $v) {
			$this->aSegmento = null;
		}

		return $this;
	} // setSegmentoId()

	/**
	 * Set the value of [categoria_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Banner The current object (for fluent API support)
	 */
	public function setCategoriaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->categoria_id !== $v) {
			$this->categoria_id = $v;
			$this->modifiedColumns[] = BannerPeer::CATEGORIA_ID;
		}

		if ($this->aCategoria !== null && $this->aCategoria->getId() !== $v) {
			$this->aCategoria = null;
		}

		return $this;
	} // setCategoriaId()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array(BannerPeer::TIPO))) {
				return false;
			}

			if ($this->tipo !== 1) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->empresa_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->titulo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->texto = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->slot = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->imagen = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->tipo = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->segmento_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->categoria_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 9; // 9 = BannerPeer::NUM_COLUMNS - BannerPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Banner object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aEmpresa !== null && $this->empresa_id !== $this->aEmpresa->getId()) {
			$this->aEmpresa = null;
		}
		if ($this->aSegmento !== null && $this->segmento_id !== $this->aSegmento->getId()) {
			$this->aSegmento = null;
		}
		if ($this->aCategoria !== null && $this->categoria_id !== $this->aCategoria->getId()) {
			$this->aCategoria = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BannerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = BannerPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aEmpresa = null;
			$this->aSegmento = null;
			$this->aCategoria = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseBanner:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BannerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			BannerPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseBanner:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseBanner:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BannerPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseBanner:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			BannerPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aEmpresa !== null) {
				if ($this->aEmpresa->isModified() || $this->aEmpresa->isNew()) {
					$affectedRows += $this->aEmpresa->save($con);
				}
				$this->setEmpresa($this->aEmpresa);
			}

			if ($this->aSegmento !== null) {
				if ($this->aSegmento->isModified() || $this->aSegmento->isNew()) {
					$affectedRows += $this->aSegmento->save($con);
				}
				$this->setSegmento($this->aSegmento);
			}

			if ($this->aCategoria !== null) {
				if ($this->aCategoria->isModified() || $this->aCategoria->isNew()) {
					$affectedRows += $this->aCategoria->save($con);
				}
				$this->setCategoria($this->aCategoria);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = BannerPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BannerPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += BannerPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aEmpresa !== null) {
				if (!$this->aEmpresa->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEmpresa->getValidationFailures());
				}
			}

			if ($this->aSegmento !== null) {
				if (!$this->aSegmento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSegmento->getValidationFailures());
				}
			}

			if ($this->aCategoria !== null) {
				if (!$this->aCategoria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategoria->getValidationFailures());
				}
			}


			if (($retval = BannerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BannerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getEmpresaId();
				break;
			case 2:
				return $this->getTitulo();
				break;
			case 3:
				return $this->getTexto();
				break;
			case 4:
				return $this->getSlot();
				break;
			case 5:
				return $this->getImagen();
				break;
			case 6:
				return $this->getTipo();
				break;
			case 7:
				return $this->getSegmentoId();
				break;
			case 8:
				return $this->getCategoriaId();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = BannerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmpresaId(),
			$keys[2] => $this->getTitulo(),
			$keys[3] => $this->getTexto(),
			$keys[4] => $this->getSlot(),
			$keys[5] => $this->getImagen(),
			$keys[6] => $this->getTipo(),
			$keys[7] => $this->getSegmentoId(),
			$keys[8] => $this->getCategoriaId(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BannerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setEmpresaId($value);
				break;
			case 2:
				$this->setTitulo($value);
				break;
			case 3:
				$this->setTexto($value);
				break;
			case 4:
				$this->setSlot($value);
				break;
			case 5:
				$this->setImagen($value);
				break;
			case 6:
				$this->setTipo($value);
				break;
			case 7:
				$this->setSegmentoId($value);
				break;
			case 8:
				$this->setCategoriaId($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BannerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmpresaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitulo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTexto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSlot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setImagen($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSegmentoId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCategoriaId($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(BannerPeer::DATABASE_NAME);

		if ($this->isColumnModified(BannerPeer::ID)) $criteria->add(BannerPeer::ID, $this->id);
		if ($this->isColumnModified(BannerPeer::EMPRESA_ID)) $criteria->add(BannerPeer::EMPRESA_ID, $this->empresa_id);
		if ($this->isColumnModified(BannerPeer::TITULO)) $criteria->add(BannerPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(BannerPeer::TEXTO)) $criteria->add(BannerPeer::TEXTO, $this->texto);
		if ($this->isColumnModified(BannerPeer::SLOT)) $criteria->add(BannerPeer::SLOT, $this->slot);
		if ($this->isColumnModified(BannerPeer::IMAGEN)) $criteria->add(BannerPeer::IMAGEN, $this->imagen);
		if ($this->isColumnModified(BannerPeer::TIPO)) $criteria->add(BannerPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(BannerPeer::SEGMENTO_ID)) $criteria->add(BannerPeer::SEGMENTO_ID, $this->segmento_id);
		if ($this->isColumnModified(BannerPeer::CATEGORIA_ID)) $criteria->add(BannerPeer::CATEGORIA_ID, $this->categoria_id);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BannerPeer::DATABASE_NAME);

		$criteria->add(BannerPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Banner (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setEmpresaId($this->empresa_id);

		$copyObj->setTitulo($this->titulo);

		$copyObj->setTexto($this->texto);

		$copyObj->setSlot($this->slot);

		$copyObj->setImagen($this->imagen);

		$copyObj->setTipo($this->tipo);

		$copyObj->setSegmentoId($this->segmento_id);

		$copyObj->setCategoriaId($this->categoria_id);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Banner Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     BannerPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new BannerPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Empresa object.
	 *
	 * @param      Empresa $v
	 * @return     Banner The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setEmpresa(Empresa $v = null)
	{
		if ($v === null) {
			$this->setEmpresaId(NULL);
		} else {
			$this->setEmpresaId($v->getId());
		}

		$this->aEmpresa = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Empresa object, it will not be re-added.
		if ($v !== null) {
			$v->addBanner($this);
		}

		return $this;
	}


	/**
	 * Get the associated Empresa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Empresa The associated Empresa object.
	 * @throws     PropelException
	 */
	public function getEmpresa(PropelPDO $con = null)
	{
		if ($this->aEmpresa === null && ($this->empresa_id !== null)) {
			$c = new Criteria(EmpresaPeer::DATABASE_NAME);
			$c->add(EmpresaPeer::ID, $this->empresa_id);
			$this->aEmpresa = EmpresaPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aEmpresa->addBanners($this);
			 */
		}
		return $this->aEmpresa;
	}

	/**
	 * Declares an association between this object and a Segmento object.
	 *
	 * @param      Segmento $v
	 * @return     Banner The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSegmento(Segmento $v = null)
	{
		if ($v === null) {
			$this->setSegmentoId(NULL);
		} else {
			$this->setSegmentoId($v->getId());
		}

		$this->aSegmento = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Segmento object, it will not be re-added.
		if ($v !== null) {
			$v->addBanner($this);
		}

		return $this;
	}


	/**
	 * Get the associated Segmento object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Segmento The associated Segmento object.
	 * @throws     PropelException
	 */
	public function getSegmento(PropelPDO $con = null)
	{
		if ($this->aSegmento === null && ($this->segmento_id !== null)) {
			$c = new Criteria(SegmentoPeer::DATABASE_NAME);
			$c->add(SegmentoPeer::ID, $this->segmento_id);
			$this->aSegmento = SegmentoPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSegmento->addBanners($this);
			 */
		}
		return $this->aSegmento;
	}

	/**
	 * Declares an association between this object and a Categoria object.
	 *
	 * @param      Categoria $v
	 * @return     Banner The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCategoria(Categoria $v = null)
	{
		if ($v === null) {
			$this->setCategoriaId(NULL);
		} else {
			$this->setCategoriaId($v->getId());
		}

		$this->aCategoria = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Categoria object, it will not be re-added.
		if ($v !== null) {
			$v->addBanner($this);
		}

		return $this;
	}


	/**
	 * Get the associated Categoria object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Categoria The associated Categoria object.
	 * @throws     PropelException
	 */
	public function getCategoria(PropelPDO $con = null)
	{
		if ($this->aCategoria === null && ($this->categoria_id !== null)) {
			$c = new Criteria(CategoriaPeer::DATABASE_NAME);
			$c->add(CategoriaPeer::ID, $this->categoria_id);
			$this->aCategoria = CategoriaPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aCategoria->addBanners($this);
			 */
		}
		return $this->aCategoria;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

			$this->aEmpresa = null;
			$this->aSegmento = null;
			$this->aCategoria = null;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseBanner:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseBanner::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} // BaseBanner
<?php namespace Tatter\Files\Entities;

use CodeIgniter\Entity;

class File extends Entity
{
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	public function getThumbnail()
	{
		if ($this->attributes['thumbnail'])
			return 'data:image/png;base64,' . $this->attributes['thumbnail'];
		return 'data:image/png;base64,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';
	}
}
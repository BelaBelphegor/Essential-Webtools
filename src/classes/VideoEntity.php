<?php

class VideoEntity implements JsonSerializable
{
	protected $id;
	protected $title;
	protected $url;
	protected $view;
	protected $rating;

	/**
	 * Accept and array of matching properties of this class.
	 * @param array $data The data used to create.
	 */
	public function __construct(array $data)
	{
		$this->id = $data['id'];
		$this->title = $data['title'];
		$this->url = $data['url'];
		$this->view = $data['view'];
		$this->rating = $data['rating'];
	}

	public function getId()
	{
		return ($this->id);
	}

	public function getTitle()
	{
		return ($this->title);
	}

	public function getUrl()
	{
		return ($this->url);
	}

	public function getView()
	{
		return ($this->view);
	}

	public function getRating()
	{
		return ($this->rating);
	}

	public function jsonSerialize() {
		return ['id' => $this->getId(),
				'title' => $this->getTitle(),
				'url' => $this->getUrl(),
				'view' => $this->getView(),
				'rating' => $this->getRating()];
	}
}

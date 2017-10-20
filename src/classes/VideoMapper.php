<?php

class VideoMapper extends Mapper
{
	public function getVideos()
	{
		$rqst = "SELECT * from videos";
		$stmt = $this->db->query($rqst);
		$results = [];
		while ($row = $stmt->fetch()) {
			$results = new VideoEntity($row);
		}
		return ($results);
	}

	public function getVideoById($video_id)
	{
		$rqst = "SELECT * from videos where id = :id";
		$stmt = $this->db->prepare($rqst);
		$result = $stmt->execute(["id" => $video_id]);
		if ($result) {
			return new VideoEntity($stmt->fetch());
		}
	}
}

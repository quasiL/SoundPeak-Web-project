<?php

// albums.json obsahuje všechna alba všech uživatelů 
    define('DBFILE', 'db/albums.json');
    $data = file_get_contents(DBFILE);
    $data = json_decode($data, JSON_OBJECT_AS_ARRAY);
    $user_data = [];

// ratings.json obsahuje všechna hodnocení všech uživatelů 
    define('DBFILE14', 'db/ratings.json');
    $data2 = file_get_contents(DBFILE14);
    $data2 = json_decode($data2, JSON_OBJECT_AS_ARRAY);

// slouží k prohledání všech alb uživatele (podle UID) v 'databázi' 
    function getItem($data, $uid) {
        $user_data = [];
        foreach($data['albums'] as $item) {
            if ($item['owner'] == $uid) {
                $user_data[] = $item;
            }
        }
        if ($user_data) {
            return $user_data;
        } else {
            return null;
        }
    }

// funkce pro uspořádání alb podle stránkovaní a zvoleného způsobu řazení 
	function getAlbumsByUidPaging($data, $uid, $limit = 5, $offset = 0, $sorting) {
		$userAlbums = getItem($data, $uid);
/*         if ($sorting == 'bu_date') {
            $sorting == false;
        }
        if ($sorting != false) {
            usort($userAlbums, function ($item1, $item2) {
                return $item1['album_name'] <=> $item2['album_name'];
            });
        } */

		$array = [];
		$last = min(($offset + $limit),count($userAlbums));
		for ($i = $offset; $i < $last; $i++) {
			array_push($array, $userAlbums[$i]);
		}
		return $array;
	}

// funkce pro přidání alba z globálního seznamu do osobního seznamu uživatele 
    function addAlbum($data, $owner, $link, $album_name, $band_name) {    
        $newAlbum = array(
            'owner' => $owner,
            'id' => uniqid(),
            'link' => $link,
            'album_name' => $album_name,
            'band_name' => $band_name     
        );
        array_push($data['albums'], $newAlbum);
        $encodedData = json_encode($data);
        file_put_contents(DBFILE,$encodedData);
    }

// toto je hledání alba podle jeho ID 
    function getAlbumById($data, $id) {
        foreach($data['albums'] as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return false;
    }

// funkce pro ukládání zpráv vývojáři do 'databáze'. 
// soubor messages.json také ukládá čas, kdy byly zprávy přidány, aby se vytvořilo zpoždění při odesílání zpráv porovnáním tohoto času s aktuálním časem 
    function addEmail($uid, $email, $message) {
        define('DBFILE3', 'db/messages.json');
        $data = file_get_contents(DBFILE3);
        $data = json_decode($data, JSON_OBJECT_AS_ARRAY);
        $status = true;
        foreach($data['messages'] as $item) {
            if ($item['owner'] == $uid) {
                if (time() - $item['time'] < 15) {
                    $status = false;
                }
            }
        }
        if ($status) {
            $newMessage = array(
                'owner' => $uid,
                'email' => $email,
                'message' => $message,
                'time' => time()  
            );
            array_push($data['messages'], $newMessage);
            $encodedData = json_encode($data);
            file_put_contents(DBFILE3,$encodedData);
            return true;
        } else {
            return null;
        }
    }

// funkce pro přidání nových recenzí 
// reviews.json obsahuje recenze všech uživatelů na všech albech 
// funkce nejprve zkontroluje, zda má uživatel v databázi recenzi na konkrétní album. Pokud již recenze existuje, bude přepsána 
    function addReview($uid, $album_name, $text) {
        define('DBFILE4', 'db/reviews.json');
        $data = file_get_contents(DBFILE4);
        $data = json_decode($data, JSON_OBJECT_AS_ARRAY);
        $status = true;
        foreach($data['reviews'] as $item) {
            if ($item['owner'] == $uid && $item['album_name'] == $album_name) {
                $status = false;
            }
        }
        if ($status) {
            $newReview = array(
                'owner' => $uid,
                'album_name' => $album_name,
                'text' => $text,
            );
            array_push($data['reviews'], $newReview);
            $encodedData = json_encode($data);
            file_put_contents(DBFILE4,$encodedData);
            return true;
        } else {
            return null;
        }
    }

// funkce zkontroluje, zda má uživatel v databázi recenzi na konkrétní album. Styl tlačítka 'Odeslat' nebo 'Upravit' závisí na výsledku. 
    function checkValue($uid, $album_name) {
        define('DBFILE10', 'db/reviews.json');
        $data = file_get_contents(DBFILE10);
        $data = json_decode($data, JSON_OBJECT_AS_ARRAY);
        $status = true;
        foreach($data['reviews'] as $item) {
            if ($item['owner'] == $uid && $item['album_name'] == $album_name) {
                $status = false;
            }
        }
        return $status;
    }

// funkce pro úpravu staré recenze 
    function editReview($uid, $album_name, $text) {
        define('DBFILE9', 'db/reviews.json');
        $data = file_get_contents(DBFILE9);
        $data = json_decode($data, JSON_OBJECT_AS_ARRAY);
        foreach($data['reviews'] as $key=>$item) {
            if ($item['owner'] == $uid && $item['album_name'] == $album_name) {
                unset($data['reviews'][array_search($item,$data['reviews'])]);
            }
        }
        $newReview = array(
            'owner' => $uid,
            'album_name' => $album_name,
            'text' => $text,
        );
        array_push($data['reviews'], $newReview);
        $encodedData = json_encode($data);
        file_put_contents(DBFILE9,$encodedData);
        return true;
    }

// toto je funkce pro získání všech recenzí pro toto album 
    function getReviews($album_name) {
        define('DBFILE5', 'db/reviews.json');
        $data = file_get_contents(DBFILE5);
        $data = json_decode($data, JSON_OBJECT_AS_ARRAY);
        $all_reviews = [];
        foreach($data['reviews'] as $item) {
            if ($item['album_name'] == $album_name) {
                $all_reviews[] = $item;
            }
        }
        if ($all_reviews) {
            return $all_reviews;
        } else {
            return null;
        }
    }

// toto je funkce pro přidání všech hodnocení všech uživatelů do všech alb (do ratings.json)
    function addRating($uid, $album_name, $rating) {
        define('DBFILE11', 'db/ratings.json');
        $data = file_get_contents(DBFILE11);
        $data = json_decode($data, JSON_OBJECT_AS_ARRAY);
        foreach($data['ratings'] as $item) {
            if ($item['owner'] == $uid && $item['album_name'] == $album_name) {
                unset($data['ratings'][array_search($item,$data['ratings'])]);
            }
        }
        $newRating = array(
            'owner' => $uid,
            'album_name' => $album_name,
            'rating' => $rating,
        );
        array_push($data['ratings'], $newRating);
        $encodedData = json_encode($data);
        file_put_contents(DBFILE11,$encodedData);
    }

// funkce pro kontrolu, zda uživatel dal hodnocení nebo ne 
    function checkRating($data2, $uid, $album_name) {
        $status = false;
        foreach($data2['ratings'] as $item) {
            if ($item['owner'] == $uid && $item['album_name'] == $album_name) {
                $rating = $item['rating'];
                $status = true;
            }
        }
        if ($status) {return $rating;}
        else {return null;}
    }
?>
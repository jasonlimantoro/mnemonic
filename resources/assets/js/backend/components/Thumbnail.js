import React from "react";
import { Thumbnail } from "react-bootstrap";
import { str_limit } from "../functionals/helper";


export const ThumbnailGallery = (
  { id,
    isActive,
    sourceImage,
    title,
    album,
    onToggleActive,
    store,
  }) => {
  const handleClick = (id) => {
    onToggleActive(id);
    store.dispatch({ type: 'UPDATE_INPUT', payload: title});
  };
  return (
    <Thumbnail
      className={`thumbnail-gallery ${isActive ? 'active' : ''}`}
      onClick={() => handleClick(id)}
    >
      <div className="thumbnail-image">
        <img src={sourceImage} alt="thumbnail-image" className="img-responsive"/>
      </div>
      Name: <strong>{str_limit(title)}</strong>
      <br />
      Album: <strong>{album}</strong>
    </Thumbnail>
  );
};

import React from "react";
import { Thumbnail } from "react-bootstrap";

function str_limit(str, length = 20, ending = "...") {
  if (str.length > length) {
    return str.substring(0, length) + ending;
  } else {
    return str;
  }
}
export const ThumbnailGallery = (
  { id,
    isActive,
    sourceImage,
    title,
    fileName,
    description,
    onToggleActive,
    store,
  }) => {
  const handleClick = (id) => {
    onToggleActive(id);
    store.dispatch({ type: 'UPDATE_INPUT', payload: fileName});
  };
  const activeClass = isActive ? "active" : '';
  return (
    <Thumbnail
      className={"thumbnail-gallery " + activeClass}
      onClick={() => handleClick(id)}
    >
      <div className="thumbnail-image">
        <img src={sourceImage} alt="thumbnail-image" className="img-responsive"/>
      </div>
      Name: <strong>{str_limit(title)}</strong>
      <br />
      Album: <strong>{description}</strong>
    </Thumbnail>
  );
};

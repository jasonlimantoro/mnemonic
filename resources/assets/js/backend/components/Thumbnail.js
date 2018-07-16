import React from "react";
import { Thumbnail, Image } from "react-bootstrap";


export const ThumbnailGallery = ( { src, children, ...rest }) => {
  return (
    <Thumbnail {...rest} >
      <div className="thumbnail-image">
        <Image src={src} alt="thumbnail-image" responsive />
      </div>
      {children}
    </Thumbnail>
  );
};

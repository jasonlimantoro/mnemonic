import React from "react";
import {StyledGalleryModal} from "./Modal";
import StyledImageSlide from "./Slide";

const DisplayImages = ({ data, showModal }) => {
  if (data.show){
    const slides = data.items.map((image, index) => {
      return (
        <StyledImageSlide
					key={index}
					url={image.url_cache}
					className={'col-md-4'}
					onClick={() => showModal(index)}
        />
      );
    });

    return (
      <div>
        <h2 className="font-theme color-theme">{data.album.name}</h2>
        {slides}
        <StyledGalleryModal heading={data.album.name} />
      </div>
    );
  } else {
    return null;
  }
};

export default DisplayImages;
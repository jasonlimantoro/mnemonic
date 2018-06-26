import React from "react";
import {GalleryModal} from "./Modal";
import ImageSlide from "./Slide";

const DisplayImages = ({ data, showModal }) => {
  if (data.show){
    const slides = data.items.map((image, index) => {
      return (
        <ImageSlide 
					key={index}
					url={image.url_cache}
					containerClass={'col-md-4 cursor-pointer'}
					imageClass={'image-album'}
					onClick={() => showModal(index)}
        />
      );
    });

    return (
      <div>
        <h2 className="font-theme color-theme">{data.album.name}</h2>
        {slides}
        <GalleryModal heading={data.album.name} />
      </div>
    );
  } else {
    return null;
  }
};

export default DisplayImages;
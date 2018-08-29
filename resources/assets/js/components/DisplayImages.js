import React from "react";
import { StyledGalleryModal } from "./Modal";
import StyledImageSlide from "./Slide";
import { urlCache } from "../backend/functionals/helper";

const DisplayImages = ({ data, showModal, imageRoute }) => {
  if (data.show) {
    const slides = data.items.map((image, index) => {
      const url = urlCache(imageRoute, 'gallery', image.name);
      return (
        <StyledImageSlide
          key={index}
          url={url}
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
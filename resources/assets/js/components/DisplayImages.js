import React from "react";
import PropTypes from "prop-types";

import { StyledGalleryModal } from "./Modal";
import StyledImageSlide from "./Slide";
import { urlCache } from "../backend/functionals/helper";

const DisplayImages = ({ data, showModal, imageRoute }) => {
  if (data.show) {
    const slides = data.items.map((image, index) => {
      const url = urlCache(imageRoute, 'gallery', image.attributes.name);
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

DisplayImages.propTypes = {
  data : PropTypes.shape({
    show: PropTypes.bool,
    album: PropTypes.shape({
      id: PropTypes.oneOfType([
        PropTypes.string,
        PropTypes.number
      ]),
      name: PropTypes.string,
    }).isRequired,
    items: PropTypes.array,
  }),
  showModal : PropTypes.func.isRequired,
  imageRoute: PropTypes.string.isRequired,
};

export default DisplayImages;
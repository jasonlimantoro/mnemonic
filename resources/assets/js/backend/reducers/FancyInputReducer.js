const reducer = (state = {}, action) => {
  switch (action.type) {
    case 'UPDATE_INPUT':
      return { ...state, inputValue: action.payload };
    case 'SHOW_MODAL':
      return { ...state, modalShow: true };
    case 'HIDE_MODAL':
      return { ...state, modalShow: false };
    default:
      return state;
  }
};

export default reducer;
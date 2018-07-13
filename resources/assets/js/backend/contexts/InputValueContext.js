import React from "react";

const InputValueContext = React.createContext({
  store: {},
});

export const withInputChange = Component => props => (
  <InputValueContext.Consumer>
    {food => <Component {...props} store={food}/>}
  </InputValueContext.Consumer>
);

export default InputValueContext;

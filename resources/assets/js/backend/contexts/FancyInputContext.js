import React from "react";

const FancyInputContext = React.createContext({
  store: {},
});

export const withFancyInput = Component => props => (
  <FancyInputContext.Consumer>
    {food => <Component {...props} store={food}/>}
  </FancyInputContext.Consumer>
);

export default FancyInputContext;


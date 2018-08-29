export function str_limit(str, length = 20, ending = "...") {
  if (str.length > length) {
    return str.substring(0, length) + ending;
  } else {
    return str;
  }
}

export function urlCache(imageRoute, filter, name){
  return `${process.env.MIX_APP_URL}/${imageRoute}/${filter}/${name}`;
}

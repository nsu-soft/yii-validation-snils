yii.validation.snils = (value, messages, options) => {
  value = value.replace(/\D/g, '');

  if (options.skipOnEmpty && yii.validation.isEmpty(value)) {
    return;
  }

  if (typeof value !== 'string') {
    yii.validation.addMessage(messages, options.message, value);
    return;
  }

  if (11 !== value.length) {
    yii.validation.addMessage(messages, options.message, value);
    return;
  }

  const checkSum = calculateCheckSum(value);

  if (checkSum !== parseInt(value.slice(-2))) {
    yii.validation.addMessage(messages, options.message, value);
  }

  function calculateCheckSum(snils) {
    let sum = 0;

    for (let i = 0; i < 9; i++) {
      sum += parseInt(snils.slice(i, i + 1)) * (9 - i);
    }

    return sum % 101 % 100;
  }
}


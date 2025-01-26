import { css } from '@emotion/react';
import { Button, Form } from 'react-bootstrap';
import OnHoverAnimationCss from '../OnHoverAnimationCss';
import { useScript } from '../../utils';
import { useState } from 'react';
import HCaptcha from '@hcaptcha/react-hcaptcha';

export default function ContactForm({ web3formsKey }) {
  const [hCaptchaResponse, setHCaptchaResponse] = useState(null);

  return (
    <Form
      action='https://api.web3forms.com/submit'
      method='POST'
      onSubmit={(e) => {
        if (!hCaptchaResponse) {
          e.preventDefault();
          alert('Please fill in the Captcha');
          return;
        }
      }}
      data-aos='fade-down'
      data-aos-duration='1200'
      data-aos-once='true'
      css={css`
        padding-left: 10px;
        padding-right: 10px;

        @media (min-width: 992px) {
          padding-left: 20%;
          padding-right: 20%;
        }
      `}
    >
      {/* Web3Forms */}
      <input type='hidden' name='access_key' value={web3formsKey}></input>
      {/* /Web3Forms */}
      <Form.Group controlId='formName'>
        <Form.Label>Name</Form.Label>
        <Form.Control
          name='name'
          type='text'
          placeholder='Enter your name'
          required
        />
      </Form.Group>
      <Form.Group controlId='formEmail' className='mt-3'>
        <Form.Label>Email address</Form.Label>
        <Form.Control
          name='email'
          type='email'
          placeholder='Enter your email'
          required
        />
      </Form.Group>
      <Form.Group controlId='formMessage' className='mt-3'>
        <Form.Label>Message</Form.Label>
        <Form.Control
          name='message'
          as='textarea'
          rows={3}
          placeholder='Enter your message'
          required
        />
      </Form.Group>

      {/* Web3Forms Captcha */}
      <div className='d-flex' style={{ marginTop: '10px' }}>
        <div style={{ flexGrow: 1 }} />
        <HCaptcha
          sitekey='50b2fe65-b00b-4b9e-ad62-3ba471098be2'
          reCaptchaCompat={false}
          onVerify={(token) => {
            setHCaptchaResponse(token);
          }}
        />
      </div>
      {/* /Web3Forms Captcha */}

      <div data-aos='zoom-out' data-aos-duration='1200' data-aos-once='true'>
        <Button
          variant='warning'
          style={{
            width: '100%',
            backgroundColor: 'red',
            borderColor: 'red',
            color: 'white',
            fontWeight: 'bold',
          }}
          type='submit'
          css={OnHoverAnimationCss(
            1.015,
            css`
              background: white !important;
              color: red !important;
            `
          )}
        >
          Send
        </Button>
      </div>
    </Form>
  );
}

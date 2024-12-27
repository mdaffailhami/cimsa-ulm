import { css } from '@emotion/react';
import { Button, Col } from 'react-bootstrap';
import OnHoverAnimationCss from '../OnHoverAnimationCss';

export default function ProgramButton({ icon, title, subtitle }) {
  return (
    <Col
      className='d-flex justify-content-center align-items-center'
      style={{ marginBottom: '24px' }}
    >
      <Button
        css={css`
          ${OnHoverAnimationCss(
            1.1,
            css`
              background-color: white !important;
              border: white !important;
              color: red !important;
            `
          )}

          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          background-color: white;
          border-color: white;
          color: red;
          border-radius: 20px;
          width: 190px;
          height: 190px;
        `}
        href='#programs'
      >
        <i
          className={icon}
          style={{
            fontSize: '40px',
            margin: '20px 0',
          }}
        />
        <h4
          style={{
            fontWeight: 'bold',
            lineHeight: 1.15,
          }}
        >
          {title}
        </h4>
        <p
          css={css`
            color: black;
            line-height: 1.3;
            font-size: 14px;

            @media (min-width: 576px) {
              font-size: 15.95px;
            }
          `}
        >
          {subtitle}
        </p>
      </Button>
    </Col>
  );
}

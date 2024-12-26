import { css } from '@emotion/react';
import { Container } from 'react-bootstrap';

export default function PageHeader({ title, description }) {
  return (
    <div
      css={css`
        padding: 0 20px;

        @media (min-width: 992px) {
          padding: 0 24%;
        }
      `}
    >
      <h1
        // data-aos='fade-down'
        css={css`
          text-align: center;
          color: red;
          font-weight: bold;

          font-size: 40px;

          @media (min-width: 768px) {
            font-size: 50px;
          }
        `}
      >
        {title}
      </h1>
      <hr
        css={css`
          margin: 10px auto 20px auto;
          border-width: 2px;
          border-color: black;
          opacity: 1;

          width: 216px;

          @media (min-width: 768px) {
            border-width: 2px;
            width: 270px;
          }
        `}
      />
      <p
        css={css`
          text-align: center;
          font-size: 17px;

          @media (min-width: 768px) {
            font-size: 18px;
          }
        `}
      >
        {description}
      </p>
    </div>
  );
}

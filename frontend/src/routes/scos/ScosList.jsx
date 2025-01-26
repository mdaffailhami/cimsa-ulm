import { Container } from 'react-bootstrap';
import ScoCard from './ScoCard';
import { css } from '@emotion/react';

export default function ScosList({ scos }) {
  return (
    <Container
      css={css`
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px 0;
        gap: 20px;
      `}
    >
      {scos.map((sco, i) => (
        <ScoCard key={i + 1} sco={sco} />
      ))}
    </Container>
  );
}
